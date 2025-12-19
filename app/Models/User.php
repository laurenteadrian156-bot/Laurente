<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    // public function bus()
    // {
    //     return $this->hasOneMany(Bus::class);
    // }

    public function schedule()
    {
        return $this->hasMany(Schedule::class);
    }


    public function isManager(): bool
    {
        return $this->role === 'manager';
    }
    public function isStudent(): bool
    {
        return $this->role === 'student';
    }
}
