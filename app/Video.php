<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tags()
    {
        return $this->morphToMany('App\Tag', 'taggable');
    }
}
