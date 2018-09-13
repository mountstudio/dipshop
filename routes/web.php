<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', function ()
{
    return view('welcome');
});

Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/order', 'UserController@order')->name('order');

Route::get('datatable', 'DatatablesController@datatable');
Route::get('datatable/getdata', 'DatatablesController@getUsers')->name('datatables.data');

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {
    Route::get('/admin', function () {
        return view('admin');
    });
    Route::get('options', 'AdminController@options')->name('options');

    Route::resource('user', 'UserController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');
});

Route::get('datatable/getusers', 'AdminController@getUsers')->name('datatable.getusers');
Route::get('datatable/getproducts', 'AdminController@getProducts')->name('datatable.getproducts');
Route::get('datatable/gettypes', 'AdminController@getTypes')->name('datatable.gettypes');

// Route::get('/alcohol', function() {
//     return view('alcohol');
// })->name('alcohol');

Route::get('/alcohols', 'ProductController@alcohols')->name('alcohol');
