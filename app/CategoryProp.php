<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryProp extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function property()
    {
        return $this->belongsTo('App\Property');
    }
}
