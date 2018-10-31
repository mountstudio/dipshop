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
        if ($request->ajax()) {
            $result = '';
            $products = Product::searchProductsLimit($request->search);

            if($products->count()) {
                HtmlContainer::fillSearchHtml($result, $products);
                $result .= '<div class="col-12 p-0">' .
                    '<a href="/search?search='.$request->search.'" class="btn btn-sm btn-dark rounded-bottom border-top-0 w-100 px-5">More...</a>' .
                    '</div>';
            }

            return response()->json($result);
        }

        return view('product._search_results', [
            'products' => Product::searchProducts($request->search),
        ]);
    }

    public function about()
    {
        return view('about');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function bidIndex()
    {
        return view('bid._admin_index');
    }
}
