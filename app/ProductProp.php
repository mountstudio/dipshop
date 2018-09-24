<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductProp extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function property()
    {
    	return $this->belongsTo('App\Property');
    } 
}
