<?php

namespace App\Http\Controllers;

use App\Bid;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function bid(Request $request)
    {
        $bid = new Bid();

        $bid->name = $request->name;
        $bid->phone = $request->phone;
        $bid->email = $request->email;
        $bid->question = $request->question;
        $bid->save();

        return back();
    }
}
