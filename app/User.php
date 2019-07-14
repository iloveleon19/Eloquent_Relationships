<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function phone()
    {
        return $this->hasOne('App\Phone');
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function videos()
    {
        return $this->hasMany('App\Video');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function roles()
    {
        return $this->belongsToMany('App\Role')->using('App\RoleUser')->withPivot('created_at', 'updated_at')->withTimestamps();
    }

    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function image()
    {
        return $this->morphOne('App\Image', 'imageable');
    }
}
