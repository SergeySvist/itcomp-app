<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\ReportType
 *
 * @property int $id
 * @property string $title
 * @method static \Illuminate\Database\Eloquent\Builder|ReportType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportType query()
 * @method static \Illuminate\Database\Eloquent\Builder|ReportType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ReportType whereTitle($value)
 * @mixin \Eloquent
 */
class ReportType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
    ];

    protected function report(): HasMany{
        return $this->hasMany(Report::class);

    }
}
