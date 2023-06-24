<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'fullname',
        'birthdate',
        'email',
        'password',
        'is_admin'
    ];

    public function tasks(): HasMany{
        return $this->hasMany(Task::class,'user_id');
    }

}
