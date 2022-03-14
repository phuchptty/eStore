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

use App\Http\Controllers\CategoryController;

Auth::routes();

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('user.home.index');

    Route::get('/category/{id}', 'CategoryController@show')->name('user.category.show');

    Route::get('/product/{id}', 'HomeController@showProduct')->name('user.product.detail');
    Route::get('/product-category/{id}', 'HomeController@showProductByCategory')->name('user.product.category');
    Route::get('/search-product', 'HomeController@searchProduct')->name('user.product.search');

    Route::get('/cart', 'CartController@index')->name('user.cart.index');
    Route::get('/add-to-cart/{id}', 'CartController@addToCart')->middleware('auth')->name('user.cart.add');

    Route::put('/update-cart', 'CartController@update')->name('user.cart.update');
    Route::delete('/remove-from-cart', 'CartController@remove')->name('user.cart.remove');
});

Route::group(['prefix' => '/admincp', 'middleware' => ['auth', 'role']], function () {
    Route::get('/', 'AdminController@index')->name('admin.home.index');

    // Product
    Route::get('/product', 'ProductController@index')->name('admin.product.index');
    Route::get('/product/{id}', 'ProductController@show')->name('admin.product.show');

    Route::get('/create-product', 'ProductController@create')->name('admin.product.create');
    Route::post('/create-product', 'ProductController@store')->name('admin.product.store');

    Route::get('/update-product/{id}', 'ProductController@edit')->name('admin.product.edit');
    Route::put('/update-product/{id}', 'ProductController@update')->name('admin.product.update');

    Route::get('/remove-product/{id}', 'ProductController@destroy')->name('admin.product.destroy');

    // Category
    Route::get('/category', 'CategoryController@index')->name('admin.category.index');
    Route::get('/category/{id}', 'CategoryController@show')->name('admin.category.show');

    Route::get('/create-category', 'CategoryController@create')->name('admin.category.create');
    Route::post('/create-category', 'CategoryController@store')->name('admin.category.store');

    Route::get('/update-category/{id}', 'CategoryController@edit')->name('admin.category.edit');
    Route::put('/update-category/{id}', 'CategoryController@update')->name('admin.category.update');

    Route::delete('/remove-category/{id}', 'CategoryController@destroy')->name('admin.category.destroy');
});
