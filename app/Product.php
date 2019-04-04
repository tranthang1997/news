<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $filltable = ['name', 'alias', 'price', 'intro', 'content', 'image', 'keywords', 'description', 'user_id', 'cate_id'];

    public $timestamps = true;

    public function cate() {
    	return $this -> belongsTo('App\Cate');
    }

    public function user() {
    	return $this -> belongsTo('App\User');
    }

    public function image() {
    	return $this -> hasMany('App\Image');
    }
}
