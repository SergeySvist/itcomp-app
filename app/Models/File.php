<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\File
 *
 * @property int $id
 * @property string $original_name
 * @property string $original_extension
 * @property string $path
 * @property int $filetype_id
 * @property int $mimetype_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFiletypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMimetypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOriginalExtension($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name', 'original_extension', 'path',
        'mimetype_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    protected function mimeType(): BelongsTo{
        return $this->belongsTo(MimeType::class);
    }

}
