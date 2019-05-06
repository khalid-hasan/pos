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
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('sess');

Route::group(['prefix' => 'admin', 'middleware'=>['sess']], function(){

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

	Route::post('/quantity-check', 'ShipmentController@quantity_check')->name('shipment.quantity_check');

	Route::get('/shipment/{id}/receive', 'ShipmentController@receive')->name('shipment.receive');
	Route::post('/shipment/{id}/receive', 'ShipmentController@received_products');



	Route::get('/order', 'OrderController@index')->name('order.index');

	Route::get('/order/create', 'OrderController@create')->name('order.create');
	Route::post('/order/create', 'OrderController@store');

	Route::get('/order/{id}/delete', 'OrderController@destroy')->name('order.delete');

	Route::post('/customer-check', 'OrderController@customer_check')->name('order.customer_check');



	Route::get('/transfer', 'TransferController@index')->name('transfer.index');

	Route::get('/transfer/create', 'TransferController@create')->name('transfer.create');
	Route::post('/transfer/create', 'TransferController@store');

	Route::get('/transfer/{id}/delete', 'TransferController@destroy')->name('transfer.delete');



	Route::get('/transfer-bd', 'TransferController@index_bd')->name('transfer-bd.index');

	Route::get('/transfer-bd/{id}/receive', 'TransferController@receive')->name('transfer-bd.receive');
	Route::get('/transfer-bd/{id}/undo', 'TransferController@undo')->name('transfer-bd.undo');




	Route::get('/customer', 'CustomerController@index')->name('customer.index');

	Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
	Route::post('/customer/create', 'CustomerController@store');

	Route::get('/customer/{id}/edit', 'CustomerController@edit')->name('customer.edit');
	Route::post('/customer/{id}/edit', 'CustomerController@update');

	Route::get('/customer/{id}/delete', 'CustomerController@destroy')->name('customer.delete');



	Route::get('/customer-transaction', 'CustomerTransactionController@index')->name('customertransaction.index');



	Route::get('/factory', 'FactoryController@index')->name('factory.index');

	Route::get('/factory/create', 'FactoryController@create')->name('factory.create');
	Route::post('/factory/create', 'FactoryController@store');

	Route::get('/factory/{id}/edit', 'FactoryController@edit')->name('factory.edit');
	Route::post('/factory/{id}/edit', 'FactoryController@update');

	Route::get('/factory/{id}/delete', 'FactoryController@destroy')->name('factory.delete');



	Route::get('/local-inventory', 'LocalInventoryController@index')->name('local-inventory.index');



	Route::get('/work-order', 'WorkOrderController@index')->name('work-order.index');
	Route::post('/work-order', 'WorkOrderController@receive')->name('work-order.receive');

	Route::get('/work-order/create', 'WorkOrderController@create')->name('work-order.create');
	Route::post('/work-order/create', 'WorkOrderController@store');

	Route::get('/work-order/{id}/delete', 'WorkOrderController@destroy')->name('work-order.delete');




	Route::get('/raw-material', 'RawMaterialController@index')->name('raw-material.index');

	Route::get('/raw-material/create', 'RawMaterialController@create')->name('raw-material.create');
	Route::post('/raw-material/create', 'RawMaterialController@store');

	Route::get('/raw-material/{id}/edit', 'RawMaterialController@edit')->name('raw-material.edit');
	Route::post('/raw-material/{id}/edit', 'RawMaterialController@update');

	Route::get('/raw-material/{id}/delete', 'RawMaterialController@destroy')->name('raw-material.delete');



	Route::get('/factory-shipment', 'FactoryShipmentController@index')->name('factory-shipment.index');

	Route::get('/factory-shipment/create', 'FactoryShipmentController@create')->name('factory-shipment.create');
	Route::post('/factory-shipment/create', 'FactoryShipmentController@store');

	Route::get('/factory-shipment/{id}/edit', 'FactoryShipmentController@edit')->name('factory-shipment.edit');
	Route::post('/factory-shipment/{id}/edit', 'FactoryShipmentController@update');

	Route::get('/factory-shipment/{id}/delete', 'FactoryShipmentController@destroy')->name('factory-shipment.delete');



	Route::get('/balance-sheet', 'BalanceSheetController@index')->name('balance-sheet.index');


	Route::get('/user', 'UserController@index')->name('user.index');

	Route::get('/user/create', 'UserController@create')->name('user.create');
	Route::post('/user/create', 'UserController@store');

	Route::get('/user/{id}/edit', 'UserController@edit')->name('user.edit');
	Route::post('/user/{id}/edit', 'UserController@update');

	Route::get('/user/{id}/delete', 'UserController@destroy')->name('user.delete');

});

