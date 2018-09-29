<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguagesController extends Controller
{
    public function set($lang) {
        session(['applocale' => $lang]);

        return back();
    }
}
