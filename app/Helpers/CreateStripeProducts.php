<?php
/**
 * Created by PhpStorm.
 * User: Tilek
 * Date: 13.11.2018
 * Time: 3:33
 */

namespace App\Helpers;


use App\Product;
use Stripe\Stripe;

class CreateStripeProducts
{
    public function create()
    {
        $products = Product::all();

        Stripe::setApiKey(env('STRIPE_KEY'));

        foreach ($products as $product) {
            $attributes = [];
            foreach ($product->properties as $property) {
                $attributes[] = $property->name;
            }

            $stripeProduct = \Stripe\Product::create([
                'name' => $product->name,
                'type' => 'good',
                'attributes' => $attributes,
                'images' => [
                    url('/uploads/large/'.$product->image),
                ],
                'url' => url('/product/'.$product->id),
            ]);

            /**
             * @var Product $product
             */
            $product->stripe_product_id = $stripeProduct['id'];
            $product->save();
        }
    }
}