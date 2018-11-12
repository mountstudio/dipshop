<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 13.11.2018
 * Time: 3:58
 */

namespace App\Helpers;


use App\Product;
use Stripe\SKU;
use Stripe\Stripe;

class CreateStripeSKU
{

    public function create()
    {
        $products = Product::all()->where('stripe_sku_id', null);

        Stripe::setApiKey(env('STRIPE_KEY'));

        foreach ($products as $product) {
            $attributes = [];
            foreach ($product->properties as $property) {
                $attributes[$property->name] = $property->pivot->value;
            }

            $sku = SKU::create([
                'product' => $product->stripe_product_id,
                'currency' => 'EUR',
                'attributes' => $attributes,
                'inventory' => [
                    'type' => 'infinite',
                ],
                'price' => $product->price*100,
                'package_dimensions' => null,
                'image' => url('/uploads/large/'.$product->image),
            ]);

            /**
             * @var Product $product
             */
            $product->stripe_sku_id = $sku->id;
            $product->save();
        }
    }
}