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
    return view('auth.login');
});

Route::get('/login', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@verify');
Route::get('/logout', 'LogoutController@index')->name('logout.index');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index')->name('admin');

Route::group(['prefix' => 'admin'], function(){
	//Route::resource('product', 'ProductController');

	Route::get('/product', 'ProductController@index')->name('product.index');

	Route::get('/product/create', 'ProductController@create')->name('product.create');
	Route::post('/product/create', 'ProductController@store');

	Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');

	Route::post('/product/{id}/edit', 'ProductController@update');

	Route::get('/product/{id}/delete', 'ProductController@destory')->name('product.delete');
	//Route::post('/product/{id}/delete', 'ProductController@destroy');
});

