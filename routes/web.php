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

Route::get('/', 'Frontend\HomeController@index')->name('home');
Route::get('/chi-tiet/{slug}', 'Frontend\HomeController@productDetail')->name('product.detail');
Route::get('/cua-hang', 'Frontend\ShopController@index')->name('shop');
Route::post('/reviews/{id}', 'Frontend\ShopController@reviews')->name('reviews');

Route::group([
    'prefix' => 'gio-hang',
    'as' => 'carts.'
], function(){
    Route::post('/add-to-cart', 'Frontend\CartController@addToCart')->name('add-cart');
    Route::get('/', 'Frontend\CartController@index')->name('list');
    Route::get('/checkout', 'Frontend\CartController@checkout')->name('checkout')->middleware('cartempty');
    Route::post('/checkout', 'Frontend\CartController@order');
    Route::get('/checkout/success', 'Frontend\CartController@checkoutSuccess')->name('success');
});

Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group([
    'prefix' => 'login',
    'as' => 'login',
    'middleware' => ['checklogout']
],function(){
    Route::get('/', 'LoginController@index');
    Route::post('/', 'LoginController@login');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'namespace' => 'Backend',
    'middleware' => ['checklogin']
], function(){
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::resource('users', 'User\UserController');
    Route::resource('categories', 'Categories\CategoriesController');
    Route::resource('products', 'Products\ProductController');
    Route::resource('orders', 'Order\OrderController');
});


