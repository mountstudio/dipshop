<?php

namespace App\Http\Controllers;

use App\Helpers\HtmlContainer;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'products' => Product::all()->random(20),
        ]);
    }

    public function home()
    {
        return view('home');
    }

    public function search(Request $request)
    {
        $result = '';
        $products = Product::searchProductsLimit($request->search);

        if($products->count()) {
            HtmlContainer::fillSearchHtml($result, $products);
            $result .= '<div class="col-12 d-flex justify-content-center">' .
                '<div class="col-auto text-center">' .
                '<a href="#" class="btn btn-primary">More...</a>' .
                '</div>' .
                '</div>';
        }

        return response()->json($result);
    }
}
