<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'products' => Product::all()->random(12),
        ]);
    }

    public function home()
    {
        return view('home');
    }
}
