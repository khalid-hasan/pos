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

	Route::get('/product', 'ProductController@index')->name('product.index');

	Route::get('/product/create', 'ProductController@create')->name('product.create');
	Route::post('/product/create', 'ProductController@store');

	Route::get('/product/{id}/edit', 'ProductController@edit')->name('product.edit');

	Route::post('/product/{id}/edit', 'ProductController@update');

	Route::get('/product/{id}/delete', 'ProductController@destroy')->name('product.delete');

	Route::get('/product/{id}/add', 'ProductController@add')->name('product.add');
	Route::get('/product/{id}/remove', 'ProductController@remove')->name('product.remove');

	

	Route::get('/inventory', 'InventoryController@index')->name('inventory.index');

	Route::get('/inventory/create', 'InventoryController@create')->name('inventory.create');
	Route::post('/inventory/create', 'InventoryController@store');

	Route::get('/inventory/{id}/edit', 'InventoryController@edit')->name('inventory.edit');

	Route::post('/inventory/{id}/edit', 'InventoryController@update');

	Route::get('/inventory/{id}/delete', 'InventoryController@destroy')->name('inventory.delete');

	

	Route::get('/shipment', 'ShipmentController@index')->name('shipment.index');

	Route::get('/shipment/create', 'ShipmentController@create')->name('shipment.create');
	Route::post('/shipment/create', 'ShipmentController@store');

	Route::get('/shipment/{id}/edit', 'ShipmentController@edit')->name('shipment.edit');

	Route::post('/shipment/{id}/edit', 'ShipmentController@update');

	Route::get('/shipment/{id}/delete', 'ShipmentController@destroy')->name('shipment.delete');


	Route::get('/order', 'OrderController@index')->name('order.index');

	Route::get('/order/create', 'OrderController@create')->name('order.create');
	Route::post('/order/create', 'OrderController@store');

	Route::get('/order/{id}/delete', 'OrderController@destroy')->name('order.delete');

});

