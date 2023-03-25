<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'surname', 'email', 'password',
    ];

    protected $hidden = [
        'role_id', 'created_at', 'updated_at', 'deleted_at',
    ];

    protected function role(): HasOne{
        return $this->hasOne(Role::class);
    }
}
