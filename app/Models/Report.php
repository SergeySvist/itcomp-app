<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Report
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $relation_id
 * @property int $type_id
 * @property string $start_date
 * @property string $end_date
 * @property int $work_time
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereRelationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereWorkTime($value)
 * @mixin \Eloquent
 */
class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description',
        'start_date', 'end_date', 'work_time',
    ];

    protected $hidden = [
        'relation_id', 'type_id',
        'created_at', 'updated_at',
    ];

    protected function relation(): BelongsTo{
        return $this->belongsTo(Relation::class);
    }
}
