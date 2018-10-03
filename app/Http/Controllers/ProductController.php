<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use Illuminate\Http\Request;

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

        $product->slug = str_slug($product->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid('product_').'.jpg';

            \Image::make($file)
                ->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/'.$fileName), 70);

            $product->image = $fileName;
        }

        $product->save();

        if ($request->properties) {
            for ($i = 0; $i < count($request->properties); $i++) {
                $product->properties()->attach($request->propertyIds[$i], ['value' => $request->properties[$i]]);
            }
        }

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

    public function addToCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = Product::find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function removeFromCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = Product::find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->remove($product, $product->id);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function deleteFromCart(Request $request)
    {
        $oldCart = \Session::has('cart') ? \Session::get('cart') : null;

        $product = Product::find($request->product_id);

        $cart = new Cart($oldCart);
        $cart->delete($product, $product->id);

        \Session::remove('cart');
        \Session::put('cart', $cart);

        return response()->json(['cart' => $cart]);
    }

    public function alcohols()
    {
        $products = collect()->merge(Product::all()->where('category_id', '=', 1));

        $categories = Category::find(1)->children;

        foreach ($categories as $category) {
            $products = $products->merge(Product::all()->where('category_id', '=', $category->id));
        }

        return view('product.show.alcohols', [
            'products' => $products->paginate(20),
            'categories' => $categories,
        ]);
    }

    public function cigaretes()
    {
        return view('product.show.cigaretes');
    }

    public function jewelry()
    {
        return view('product.show.jewelry');
    }

    public function accessories()
    {
        return view('product.show.accessories');
    }

    public function coffee()
    {
        return view('product.show.coffee');
    }

    public function perfume()
    {
        return view('product.show.perfume');
    }

    public function sort(Request $request)
    {
        $products = $request->sort == 'asc'
            ? Product::all()->sortBy($request->param) 
            : Product::all()->sortByDesc($request->param);
        $products = $products->where('category_id', '=', $request->kind);

        $categories = Category::find(1)->children;

        return view('product.show.alcohols', [
            'products' => $products->paginate($request->perPage),
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
                ->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/'.$fileName), 70);

            $product->image = $fileName;
        }

        $product->slug = str_slug($product->name);

        $product->save();

        if ($request->properties) {
            for ($i = 0; $i < count($request->properties); $i++) {
                $product->properties()->attach($request->propertyIds[$i], ['value' => $request->properties[$i]]);
            }
        }

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
