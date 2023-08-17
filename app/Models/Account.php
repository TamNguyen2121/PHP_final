<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Account extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';

    protected $fillable = [
        'username',
        'email',
        'password',
        'mobile',
        'type',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
