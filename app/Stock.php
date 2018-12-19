<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('new_price');
    }
}
