<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\FileType
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @method static \Illuminate\Database\Eloquent\Builder|FileType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType query()
 * @method static \Illuminate\Database\Eloquent\Builder|FileType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileType whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FileType whereTitle($value)
 * @mixin \Eloquent
 */
class FileType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title', 'slug',
    ];

    protected function projectFile(): HasMany{
        return $this->hasMany(ProjectFile::class);
    }
}
