<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\RelationType
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|RelationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|RelationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RelationType whereTitle($value)
 * @mixin \Eloquent
 */
class RelationType extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    protected function relation(): HasMany{
        return $this->hasMany(Relation::class);

    }
}
