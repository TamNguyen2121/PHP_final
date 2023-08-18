<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $guarded = [];
    protected $fillable = ['name', 'email','message','post_id' ];

    use HasFactory;
}