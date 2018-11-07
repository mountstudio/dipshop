<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users._admin_index');
    }

    public function profile()
    {
        return view('user.profile', [
            'user' => Auth::user(),
        ]);
    }
    public function order()
    {
        return view('user.order');
    }

    public function activate(Request $request, $id)
    {
        $user = User::find($id);
        $user->is_active = true;
        $user->percent = $request->percent;
        $user->save();

        return redirect()->route('user.index');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect()->route('user.index');
    }
}
