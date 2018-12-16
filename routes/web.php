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

Route::get('/', 'MainController@index')->name('homepage');
Route::get('/about', 'MainController@about')->name('about');
Route::get('/contacts', 'MainController@contacts')->name('contacts');

Auth::routes();

Route::get('/password/change', 'UserController@changeGet')->name('change_password');
Route::post('/password/change', 'UserController@changePost')->name('change_password_post');

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
    Route::get('/activate-user/{id}', 'UserController@activate')->name('user.activate');
    Route::get('/deactivate-user/{id}', 'UserController@deactivate')->name('user.deactivate');
    Route::get('/delivered/{id}', 'BasketController@delivered')->name('basket.delivered');

    Route::resource('product', 'ProductController')->except([
        'show'
    ]);
    Route::get('/bid', 'MainController@bidIndex')->name('bid.index');
    Route::resource('basket', 'BasketController')->except([
        'show'
    ]);
    Route::resource('category', 'CategoryController')->except([
        'show'
    ]);
    Route::resource('property', 'PropertyController');
    Route::resource('stock', 'StockController');
});

Route::get('datatable/getusers', 'AdminController@getUsers')->name('datatable.getusers');
Route::get('datatable/getproducts', 'AdminController@getProducts')->name('datatable.getproducts');
Route::get('datatable/gettypes', 'AdminController@getTypes')->name('datatable.gettypes');
Route::get('datatable/getproperties', 'AdminController@getProperties')->name('datatable.getproperties');
Route::get('datatable/getbaskets', 'AdminController@getBaskets')->name('datatable.getbaskets');
Route::get('datatable/getbids', 'AdminController@getBids')->name('datatable.getbids');
Route::get('datatable/getstocks', 'AdminController@getStocks')->name('datatable.getstocks');

Route::get('/home', 'HomeController@index')->name('welcome');

Route::get('/product/sort', 'ProductController@sort')->name('product');
Route::get('/alcohols', 'ProductController@alcohols')->name('alcohol');
Route::get('/cigaretes', 'ProductController@cigaretes')->name('cigaretes');
Route::get('/jewelry', 'ProductController@jewelry')->name('jewelry');
Route::get('/accessories', 'ProductController@accessories')->name('accessories');
Route::get('/coffee', 'ProductController@coffee')->name('coffee');
Route::get('/perfume', 'ProductController@perfume')->name('perfume');
Route::get('/send', 'MailController@index');
Route::get('/bid', 'Controller@bid')->name('bid');

Route::get('/getchildren/{id}', 'CategoryController@getChildren')->name('getchildren');
Route::get('/getproperties/{id}', 'PropertyController@getPropertiesByCategory')->name('getproperties');

Route::get('/set-language/{lang}', 'LanguagesController@set')->name('set.language');

Route::get('/get-cart', 'CartController@getCart');
Route::post('/add-to-cart', 'CartController@addToCart'); //Add 1 item To Cart
Route::post('/remove-from-cart', 'CartController@removeFromCart'); //Remove 1 item From Cart
Route::post('/delete-from-cart', 'CartController@deleteFromCart'); //Delete items from Cart

//ORDER
Route::match(['get', 'post'], '/order', 'CartController@order');
Route::resource('basket', 'BasketController')->except([
    'index'
]);

Route::resource('product', 'ProductController')->only([
    'show',
]);
Route::resource('category', 'CategoryController')->only([
    'show',
]);

//Search
Route::get('/search', 'MainController@search')->name('search');