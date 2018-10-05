<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

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
        if ($request->ajax())
        {
            $result="";
            $products = DB::table('products')->where('name', 'LIKE', '%'.$request->search.'%')
                ->orWhere('slug', 'LIKE','%'.$request->search.'%')->get();
            if($products)
            {
                foreach ($products as $product) {
                    $category = Category::find($product->category_id);
                    $result.= '<div style="min-width: 220px" class="col-2 mb-4">'.
                        '<div class="card hover-shadow transition-500 border pt-3" style="border: 3px solid #dee2e6 !important">'.
                            '<img class="card-img-top px-1" src="'.asset('uploads/'.$product->image).'" alt="Card image cap">'.
                            '<div class="card-body d-flex px-2 pb-1">'.
                                '<div class="text-capitalize mr-auto font-weight-bold">'.__('categories.'.$category->slug).'</div>'.
                                '<div class="card-title ml-auto font-weight-bold text-right" style="min-width: 70px;"><span class="h5">'.number_format($product->price, 2).'</span> &euro;</div>'.
                            '</div>'.
                            '<div class="card-body px-2 pb-0 pt-1 d-flex">'.
                                '<div class="card-title h6 mr-auto" style="min-height: 64px;">'.$product->name.'</div>'.
                            '</div>'.
                            '<div class="card-body px-0 pb-0 pt-2 text-center">'.
                                '<p class="btn btn-success shadow-lg font-weight-light cart mb-3 to_cart" data-id="'.$product->id.'"  data-toggle="tooltip" data-placement="bottom" title="'.__('main.cartnotwork').'">'.__('main.addtocart').'</p>'.
                            '</div>'.
                        '</div>'.
                    '</div>';
                }
            }

            return Response($result);
        }
    }
}
