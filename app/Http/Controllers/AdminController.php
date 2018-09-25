<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Property;
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

    public function getProducts()
    {
        $products = Product::with('category')->select('*');

        return Datatables::eloquent($products)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('product.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('product.destroy', $model->id).'" data-id="'.$model->id.'"onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getTypes()
    {
        $categories = Category::with('parent')->select('*');

        return Datatables::eloquent($categories)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('category.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('category.destroy', $model->id).'" data-id="'.$model->id.'"onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getProperties()
    {
        $properties = Property::query();

        return Datatables::eloquent($properties)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('property.edit', $model->id).'" class="btn btn-sm btn-primary"><i class="far fa-edit"></i> Edit</a>
                        <a href="'.route('property.destroy', $model->id).'" data-id="'.$model->id.'"onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }
}
