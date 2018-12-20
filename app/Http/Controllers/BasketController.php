<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Cart;
use App\User;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('basket._admin_index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $oldCart = \Session::get('cart');
        $cart = new Cart($oldCart);

        $basket = new Basket($request->request->all());

        $basket->user_id = \Auth::user()->id;
        $basket->total_price = $cart->totalPrice;
        if ($request->delivery) {
            $basket->delivery = true;
            $basket->address = $request->address;
            $basket->delivery_date = \DateTime::createFromFormat('d/m/Y', $request->date);
            $basket->delivery_time = new \DateTime($request->time);
        } else {
            $basket->delivery = false;
        }

        $basket->save();

        foreach ($cart->items as $item) {
            $basket->products()->attach($item['item']->id, ['one_price' => $item['one_price'], 'qty' => $item['qty'], 'price' => $item['price']]);
        }

        $basket->save();

        \Session::remove('cart');

        return redirect()->route('homepage')->with('order_status', 'Order stored successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        return response()->json([
            'basket_id' => $basket->id,
            'view' => view('basket.show', [
                'basket' => $basket->load(['user', 'products']),
            ])->render(),
        ]);
    }

    public function delivered($id)
    {
        $basket = (new Basket)->find($id);

        $basket->is_delivered = true;
        $basket->save();

        return back()->with('status', 'Successfully updated');
    }
}
