<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    public function category_property() 
    {
    	return $this->hasMany('App\CategoryProp');
    }

    public function product_property() 
    {
    	return $this->hasMany('App\ProductProp');
    }
}
