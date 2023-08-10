<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded =['create_at', 'updated_at', 'deleted_at'];
    protected $dates=[ 'published_at'];
}
