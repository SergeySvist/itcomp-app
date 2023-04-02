<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name', 'original_extension', 'path',
        'filetype_id', 'mimetype_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected function mimeType(): BelongsTo{
        return $this->belongsTo(MimeType::class);
    }

    protected function fileType(): BelongsTo{
        return $this->belongsTo(FileType::class);
    }
}
