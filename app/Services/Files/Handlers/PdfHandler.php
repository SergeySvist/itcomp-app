<?php

namespace App\Services\Files\Handlers;

use App\Services\Files\AbstractFileHandler;
use Illuminate\Http\UploadedFile;

class PdfHandler extends AbstractFileHandler
{
    protected string $directory = "pdf";

    public const fileTypes = [
        "application/pdf",
    ];

    public function store(UploadedFile $uploadedFile): string
    {
        return $uploadedFile->store($this->directory);
    }
}
