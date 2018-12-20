<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stock.admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stock.create', [
            'products' => \DB::table('products')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock = Stock::create([
            'name' => $request->name,
            'start_date' => new \DateTime($request->start_date),
            'end_date' => new \DateTime($request->end_date),
        ]);

        foreach ($request->products as $index => $product) {
            $product = Product::find($product);
            $product->stock_id = $stock->id;
            $product->new_price = $request->prices[$index];
            $product->save();
        }

        return redirect()->route('stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        return view('stock.show', [
            'stock' => $stock,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        return view('stock.edit', [
            'stock' => $stock,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $stock->update($request->request->all());

        $this->addProducts($stock, $request);

        return redirect('stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock $stock
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Stock $stock)
    {
        $stock->delete();

        return back();
    }

    public function addProducts($stock, $request)
    {
        if ($request->products) {
            for ($i = 0; $i < count($request->products); $i++) {
                $stock->products()->attach($request->products[$i], ['new_price', $request->newPrices[$i]]);
            }
        }
    }
}
