<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
