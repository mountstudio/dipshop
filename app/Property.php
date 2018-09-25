<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
	protected $guarded = [];

    public function categories()
    {
    	return $this->belongsToMany('App\Category');
    }

    public function products()
    {
    	return $this->belongsToMany('App\Product');
    }
}
