<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'codename', 'email', 'password','picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }

    public function userinfo(){
        return $this->hasOne('App\UserInfo');
    }

    public function supports(){
        return $this->hasMany('App\Support');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }

    

}
