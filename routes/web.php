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

// Route::get('/', function () {
//     return view('welcome');
// });

use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::get('/', 'HomeController@index');
    Route::get('/home','HomeController@index');

    // Products
    Route::get('/products','ProductsController@index');

    // Ingredients
    Route::get('/ingredient_dashboard','IngredientsController@ingredient_dashboard');

    // Available Ingredients
    Route::get('/available','AvailableController@index');

    // Inbound Ingredients
    Route::get('/inbound','InboundController@index');

    // Outbound Ingredients
    Route::get('/outbound','OutboundController@index');

    # Reserved
    Route::get('/reserved','ReservedController@index');
    Route::post('add-reserved','ReservedController@store');
    Route::post('update-reserved/{id}','ReservedController@update');
    // Ingredients Profile
    Route::get('/profile','IngredientsController@ingredient_profile');

    // Orders
    Route::get('/order_dashboard','OrdersController@order_dashboard');

    // New Orders
    Route::get('/new_orders','OrdersController@new_order');
    // Book Orders
    Route::get('/booked_orders','OrdersController@booked_orders');
    // New Stock
    Route::get('/new_stock','OrdersController@new_stock');
    // Company
    Route::get('/companies','CompanyController@index');
    Route::post('/new_company','CompanyController@store');
    Route::post('edit_company/{id}', 'CompanyController@update');
    Route::post('deactivate_company/{id}', 'CompanyController@deactivate');
    Route::post('activate_company/{id}', 'CompanyController@activate');
    // Role
    Route::get('/roles','RoleController@index');
    Route::post('/new_role','RoleController@store');
    Route::post('edit_role/{id}', 'RoleController@update');
    Route::post('deactivate_role/{id}', 'RoleController@deactivate');
    Route::post('activate_role/{id}', 'RoleController@activate');

    # User
    Route::get('/users','UserController@index');
    Route::post('add-user', 'UserController@store');
    Route::post('update-user/{id}', 'UserController@update');
    Route::post('deactivate-user/{id}', 'UserController@deactivate');
    Route::post('activate-user/{id}', 'UserController@activate');

    # Ingredients
    Route::get('ingredient', 'IngredientsController@index');   
    
    # Shipment
    Route::get('shipments', 'ShipmentController@index');
    Route::get('shipment-export', 'ShipmentController@shipmentExport');
    Route::post('shipment-import', 'ShipmentController@shipmentImport');
});

