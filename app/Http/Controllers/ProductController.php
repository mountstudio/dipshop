<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create', [
            'categories' => Category::all()->where('parent_id', '=', null),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $product = new Product($validated);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid('product_').'.jpg';

            \Image::make($file)
                ->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/'.$fileName), 70);

            $product->image = $fileName;
        }

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show', [
            'product' => $product,
        ]);
    }

    public function alcohols()
    {
        $alcohols = Product::all()->where('category_id', '=', 1);
        $categories = Category::find(1)->children;

        return view('product.show.alcohols', [
            'alcohols' => $alcohols,
            'categories' => $categories,
        ]);
    }


    public function sort(Request $request)
    {
        $products = $request->sort == 'asc' 
            ? Product::all()->sortBy($request->param) 
            : Product::all()->sortByDesc($request->param);
        $products = $products->where('category_id', '=', $request->kind);

        $categories = Category::find(1)->children;

        return view('product.show.alcohols', [
            'alcohols' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product.edit', [
            'product' => $product,
            'categories' => Category::all()->where('parent_id', '=', null),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->fill($validated);

        if ($request->hasFile('image')) {
            if ($product->getOriginal('image') && is_file(public_path('uploads/'.$product->getOriginal('image')))) {
                unlink(public_path('uploads/'.$product->getOriginal('image')));
            }

            $file = $request->file('image');
            $fileName = uniqid('product_'.$product->id.'_').'.jpg';

            \Image::make($file)
                ->resize(700, 700, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/'.$fileName), 70);

            $product->image = $fileName;
        }

        $product->save();

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back();
    }
}
