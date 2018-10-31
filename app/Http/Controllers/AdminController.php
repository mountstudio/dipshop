<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Bid;
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
        $users = User::select(['id', 'name', 'email', 'password', 'created_at', 'updated_at','is_active']);

        return Datatables::of($users)
            ->addColumn('action', function ($user) {
                return '<a href="'.route('user.activate', $user->id).'" class="btn btn-sm btn-primary"><i class="fas fa-lock-open"></i> Активировать</a>
                        <a href="'.route('user.deactivate', $user->id).'" class="btn btn-sm btn-danger"><i class="fas fa-lock"></i> Деактивировать</a>';
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
                        <a href="'.route('property.destroy', $model->id).'" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#delete-confirmation" class="btn btn-sm btn-danger"><i class="far fa-trash-alt"></i> Delete</a>';
            })
            ->make(true);
    }

    public function getBids()
    {
        $bids = Bid::query();

        return Datatables::eloquent($bids)
            ->make(true);
    }

    public function getBaskets()
    {
        $baskets = Basket::query();

        return DataTables::eloquent($baskets)
            ->addColumn('action', function ($model) {
                return '<a href="'.route('basket.show', $model->id).'" class="btn btn-sm btn-primary show-basket" data-id="'.$model->id.'" onclick="event.preventDefault();" data-toggle="modal" data-target="#show-basket"><i class="fas fa-info"></i> Подробнее</a>
                        <a href="'.route('basket.delivered', $model->id).'" class="btn btn-sm btn-success"><i class="fas fa-truck"></i> Доставлено</a>';
            })
            ->setRowClass(function ($modal) {
                return $modal->is_delivered ? 'bg-warning' : '';
            })
            ->order(function ($query) {
                $query->orderBy('created_at', 'desc');
            })
            ->make(true);
    }
}
