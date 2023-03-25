<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name', 'original_extension', 'path',
    ];

    protected $hidden = [
        'filetype_id', 'mimetype_id',
        'created_at', 'updated_at',
    ];

    protected function fileType(): HasOne{
        return $this->hasOne(FileType::class);
    }

    protected function mimeType(): HasOne{
        return $this->hasOne(MimeType::class);
    }
}
