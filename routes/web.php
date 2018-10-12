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

Route::get('/', 'MainController@home');



Auth::routes();


Route::get('/productshow/{id}', 'ProductController@product');
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
    Route::resource('product', 'ProductController')->except([
        'show'
    ]);
    Route::resource('category', 'CategoryController')->except([
        'show'
    ]);
    Route::resource('property', 'PropertyController');
});

Route::get('datatable/getusers', 'AdminController@getUsers')->name('datatable.getusers');
Route::get('datatable/getproducts', 'AdminController@getProducts')->name('datatable.getproducts');
Route::get('datatable/gettypes', 'AdminController@getTypes')->name('datatable.gettypes');
Route::get('datatable/getproperties', 'AdminController@getProperties')->name('datatable.getproperties');

Route::get('/home', 'HomeController@index')->name('welcome');

Route::get('/product/sort', 'ProductController@sort')->name('product');
Route::get('/alcohols', 'ProductController@alcohols')->name('alcohol');
Route::get('/cigaretes', 'ProductController@cigaretes')->name('cigaretes');
Route::get('/jewelry', 'ProductController@jewelry')->name('jewelry');
Route::get('/accessories', 'ProductController@accessories')->name('accessories');
Route::get('/coffee', 'ProductController@coffee')->name('coffee');
Route::get('/perfume', 'ProductController@perfume')->name('perfume');

Route::get('/getchildren/{id}', 'CategoryController@getChildren')->name('getchildren');
Route::get('/getproperties/{id}', 'PropertyController@getPropertiesByCategory')->name('getproperties');

Route::get('/set-language/{lang}', 'LanguagesController@set')->name('set.language');

Route::post('/add-to-cart', 'CartController@addToCart');
Route::get('/get-cart', 'CartController@getCart');

Route::resource('product', 'ProductController')->only([
    'show',
]);
Route::resource('category', 'CategoryController')->only([
    'show',
]);

//Search
Route::get('/search', 'MainController@search')->name('search');