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

Auth::routes();

Route::group(['prefix' => '/'], function () {
    Route::get('/', 'HomeController@index')->name('user.home.index');

    Route::get('/category/{id}', 'CategoryController@show')->name('user.category.show');
    Route::get('/product/{id}', 'ProductController@show')->name('user.product.detail');
});

Route::group(['prefix' => '/admin', 'middleware' => ['auth', 'role']], function () {
    Route::get('/', 'AdminController@index')->name('admin.home.index');
});
