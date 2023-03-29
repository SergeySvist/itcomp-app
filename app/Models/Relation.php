<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
