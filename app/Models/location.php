<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    // use HasFactory;

    protected $guarded =['create_at', 'deleted_at', 'updated_at'];
}
