<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\MimeType
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|MimeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MimeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MimeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|MimeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MimeType whereTitle($value)
 * @mixin \Eloquent
 */
class MimeType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    protected function file(): HasMany{
        return $this->hasMany(File::class);

    }
}
