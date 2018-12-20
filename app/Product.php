<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'price', 'category_id'];

    /**
     * Searching products by string with limit by 5
     *
     * @param string $search
     *
     * @return \Illuminate\Support\Collection
     */
    public static function searchProductsLimit(string $search)
    {
        return (new Product)->where('name', 'like', $search . '%')->limit(5)->get();
    }

    /**
     * Searching products by string
     *
     * @param string $search
     *
     * @return \Illuminate\Support\Collection
     */
    public static function searchProducts(string $search)
    {
        return (new Product)->where('name', 'like', $search . '%')->get();
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function properties()
    {
        return $this->belongsToMany('App\Property')->withPivot('value');
    }

    public function baskets()
    {
        return $this->belongsToMany('App\Basket')->withPivot(['one_price', 'qty', 'price']);
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }
}
