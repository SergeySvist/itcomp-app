<?php

namespace App\Services\Files;

use App\Exceptions\ApiBadRequestException;
use App\Exceptions\ApiNotFoundException;
use App\Models\File;
use App\Models\MimeType;
use App\Services\Files\Handlers\ImageHandler;
use App\Services\Files\Handlers\PdfHandler;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class FileService
{

    private $handlers = [
        PdfHandler::class,
        ImageHandler::class,
    ];

    private ?AbstractFileHandler $fileHandler = null;

    public function save(UploadedFile $uploadedFile){
        $mimetype = DB::table('mime_types')->where('title', $uploadedFile->getClientMimeType())->first();

        if (!isset($mimetype))
            throw new ApiNotFoundException('File mime type is undefined' . $uploadedFile->getMimeType());

        $path = $this->getFileHandler($uploadedFile->getClientMimeType())->store($uploadedFile);

        $file = new File([
            'original_name' => $uploadedFile->getClientOriginalName(),
            'original_extension' => $uploadedFile->getClientOriginalExtension(),
            'path' => $path,
            'mimetype_id' => $mimetype->id,
        ]);

        $file->save();

        return $file;
    }

    private function findHandlerClass(string $fileType): string{
        foreach ($this->handlers as $handler)
            if (in_array($fileType, $handler::fileTypes))
                return $handler;

        throw new ApiBadRequestException('File format (mime type) not supported');
    }

    private function getFileHandler(string $fileType): AbstractFileHandler{
        $handlerClass = $this->findHandlerClass($fileType);

        if (!($this->fileHandler instanceof $handlerClass))
            $this->fileHandler = new $handlerClass;

        return $this->fileHandler;
    }
}
