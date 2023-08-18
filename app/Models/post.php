<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $guarded =['create_at', 'updated_at', 'deleted_at'];
    protected $dates=[ 'published_at'];

    public function location(){
        return $this->belongsTo('App\Models\location');
        }
    public function account(){
            return $this->belongsTo('App\Models\Account');
            }
    public function Tag()
    {
        return $this->belongsToMany('App\Models\Tag');
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

}