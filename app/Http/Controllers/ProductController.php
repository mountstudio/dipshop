<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use App\Stock;
use Carbon\Carbon;
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
        return view('product.admin');
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
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $validated = $request->validated();

        $product = new Product($validated);

        $product->slug = str_slug($product->name);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileName = uniqid('product_'.$product->slug.'_').'.jpg';

            \Image::make($file)
                ->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/small/'.$fileName), 40);
            \Image::make($file)
                ->resize(null, 1500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/large/'.$fileName), 40);

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
        $countSimilars = Product::all()->where('category_id', '=', $product->category->id )->count();

        if ($countSimilars > 4) {
            $similars = Product::all()->where('category_id', '=', $product->category->id )->random(5);
        } else {
            $similars = null;
        }

        return view('product.show', [
            'product' => $product,
            'products' => Product::all()->random(10),
            'similars' => $similars,
        ]);
    }

    public function discounts()
    {
        $stocks = Stock::all()
            ->where('start_date', '<', Carbon::now('GMT+6'))
            ->where('end_date', '>', Carbon::now('GMT+6'));

        $products = collect();
        foreach ($stocks as $stock) {
            $products = $products->merge($stock->products);
        }

        return view('product.show.discount', [
            'products' => $products->paginate(20),
        ]);
    }

    public function alcohols()
    {
        $products = collect()->merge(Product::all()->where('category_id', '=', 1));

        $categories = (new Category)->find(1)->children;

        foreach ($categories as $category) {
            $products = $products->merge(Product::all()->where('category_id', '=', $category->id));
        }

        return view('product.show.alcohols', [
            'products' => $products->paginate(20),
            'categories' => $categories,
            'mainCatId' => 1,
        ]);
    }

    public function cigaretes()
    {
        $products = collect()->merge(Product::all()->where('category_id', '=', 13));

        $categories = (new Category)->find(13)->children;

        foreach ($categories as $category) {
            $products = $products->merge(Product::all()->where('category_id', '=', $category->id));
        }

        return view('product.show.alcohols', [
            'products' => $products->paginate(20),
            'categories' => $categories,
            'mainCatId' => 13,
        ]);
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
        $products = $products->where('category_id', '=', $request->kind ? $request->kind : $request->mainCatId);

        $categories = (new Category)->find($request->mainCatId)->children;

        return view('product.show.alcohols', [
            'products' => $products->paginate($request->perPage),
            'categories' => $categories,
            'mainCatId' => $request->mainCatId,
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
     * @param ProductRequest $request
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->fill($validated);

        if ($request->hasFile('image')) {
            if ($product->getOriginal('image') && is_file(public_path('uploads/small/'.$product->getOriginal('image')))) {
                unlink(public_path('uploads/small/'.$product->getOriginal('image')));
            }
            if ($product->getOriginal('image') && is_file(public_path('uploads/large/'.$product->getOriginal('image')))) {
                unlink(public_path('uploads/large/'.$product->getOriginal('image')));
            }

            $file = $request->file('image');
            $fileName = uniqid('product_'.$product->slug.'_').'.jpg';

            \Image::make($file)
                ->resize(null, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/small/'.$fileName), 40);
            \Image::make($file)
                ->resize(null, 1500, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/large/'.$fileName), 40);

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
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back();
    }

    public function apiIndex(Request $request)
    {
        if ($request->ids) {
            $products = Product::whereNotIn('id', $request->ids)
                ->where('stock_id', '=', null)
                ->get(['id', 'name']);
        } else {
            $products = Product::where('stock_id', '=', null)
                ->get(['id', 'name']);
        }

        return response()->json([
            'id' => $request->ids,
            'products' => $products,
        ]);
    }
}
