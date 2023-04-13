<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id', 'file_id', 'filetype_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected function fileType(): BelongsTo{
        return $this->belongsTo(FileType::class);
    }
}
