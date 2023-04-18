<?php

namespace App\Services\Files\Handlers;

use App\Services\Files\AbstractFileHandler;
use Illuminate\Http\UploadedFile;

class ImageHandler extends AbstractFileHandler
{
    protected string $directory = "images";

    public const fileTypes = [
        "image/png",
    ];

    public function store(UploadedFile $uploadedFile): string
    {
        return $uploadedFile->store($this->directory);
    }
}
