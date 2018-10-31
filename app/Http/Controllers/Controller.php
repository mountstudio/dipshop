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
        $bid = new Bid($request->request->all());
        $bid->save();

        return back()->with('question_status', 'Your question on our mind!');
    }
}
