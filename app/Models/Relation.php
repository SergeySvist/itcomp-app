<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Relation
 *
 * @property int $id
 * @property int $project_id
 * @property int $user_id
 * @property string $start_date
 * @property string $end_date
 * @property int $type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Relation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Relation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Relation whereUserId($value)
 * @mixin \Eloquent
 */
class Relation extends Model
{
    use HasFactory;

    protected $fillable = [
        'start_date', 'end_date',
    ];

    protected $hidden = [
        'project_id', 'user_id', 'type_id',
        'created_at', 'updated_at',
    ];


    protected function report(): HasMany{
        return $this->hasMany(Report::class);
    }

    protected function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    protected function project(): BelongsTo{
        return $this->belongsTo(Project::class);
    }

    protected function relationType(): BelongsTo{
        return $this->belongsTo(RelationType::class);
    }
}
