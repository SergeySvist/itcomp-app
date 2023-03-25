<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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

    protected function relationType(): HasOne{
        return $this->hasOne(RelationType::class);
    }

    protected function user(): HasOne{
        return $this->hasOne(User::class);
    }

    protected function project(): HasOne{
        return $this->hasOne(Project::class);
    }
}
