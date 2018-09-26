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

Route::get('/', 'MainController@index')->name('welcome');

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
    Route::resource('product', 'ProductController');
    Route::resource('category', 'CategoryController');
    Route::resource('property', 'PropertyController');
});

Route::get('datatable/getusers', 'AdminController@getUsers')->name('datatable.getusers');
Route::get('datatable/getproducts', 'AdminController@getProducts')->name('datatable.getproducts');
Route::get('datatable/gettypes', 'AdminController@getTypes')->name('datatable.gettypes');
Route::get('datatable/getproperties', 'AdminController@getProperties')->name('datatable.getproperties');

// Route::get('/alcohol', function() {
//     return view('alcohol');
// })->name('alcohol');

Route::post('/product/sort', 'ProductController@sort')->name('product');
Route::get('/alcohols', 'ProductController@alcohols')->name('alcohol');


Route::get('/getchildren/{id}', 'CategoryController@getChildren')->name('getchildren');
Route::get('/getproperties/{id}', 'PropertyController@getPropertiesByCategory')->name('getproperties');