<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
     public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function supports(){
    	return $this->hasMany('App\Support');
    }
    public function comments(){
    	return $this->hasMany('App\Comment');
    }
}
