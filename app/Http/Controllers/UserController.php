<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Mail\UserActiveted;
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

        \Mail::to($user->email)->send(new UserActiveted($user));

        return redirect()->route('user.index');
    }

    public function deactivate($id)
    {
        $user = User::find($id);
        $user->is_active = false;
        $user->save();

        return redirect()->route('user.index');
    }

    public function changeGet()
    {
        $this->middleware('auth');

        return view('auth.passwords.change');
    }

    public function changePost(ChangePasswordRequest $request)
    {
        $this->middleware('auth');

        $validated = $request->validated();

        Auth::user()->password = \Hash::make($validated['new_password']);
        Auth::user()->save();

        return redirect()->route('homepage');
    }
}
