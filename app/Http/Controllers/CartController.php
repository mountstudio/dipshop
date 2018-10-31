<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Cart;
use App\Helpers\HtmlContainer;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCart()
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;
        $result = '';

        HtmlContainer::fillCartInfo($result, $oldCart);

        return response()->json([
            'cart' => $oldCart,
            'result' => $result,
        ]);
    }

    public function addToCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = (new Product)->find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $result = '';

        HtmlContainer::fillCartInfo($result, $cart);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        return response()->json(['cart' => $cart, 'result' => $result]);
    }

    public function removeFromCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = (new Product)->find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        $result = '';

        HtmlContainer::fillCartInfo($result, $cart);

        return response()->json(['cart' => $cart, 'result' => $result]);
    }

    public function deleteFromCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = (new Product)->find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        $result = '';

        HtmlContainer::fillCartInfo($result, $cart);

        return response()->json(['cart' => $cart, 'result' => $result]);
    }

    public function order()
    {
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);

        return view('order.order', [
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'realPrice' => $cart->realPrice,
        ]);
    }
}
