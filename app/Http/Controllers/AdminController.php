<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function options()
    {
        return view('admin.options');
    }

    public function getUsers()
    {
        $users = User::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.route('user.edit', $user->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('user.destroy', $user->id).'" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->removeColumn('password')
            ->make(true);
    }
}
