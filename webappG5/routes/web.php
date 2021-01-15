<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');

});



Route::get('/master', 'App\Http\Controllers\inventoryController@master');

Route::resource('/user', 'App\Http\ControllitemContriller');
Route::resource('/item', 'App\Http\Controllers\itemController');

//Log In Routes
Route::get('/login', 'usersController' );

//StockIn
Route::get('/stockinlist', 'itemController@showStockIn')->name('stockin');
Route::post('/stockinitemContriller@stockIn');

//StockIn List
Route::get('stockinlist', 'itemController@stockInList');

//Update StockIn
Route::get('updatestockin/{id}itemController@editStockIn');
Route::post('updatestockin/{id}itemController@updateStockIn');

//Delete StockIn
Route::get('deletestockin/{id}itemController@deleteStockIn');

//StockOut
Route::get('/stockoutitemContriller@showStockOut')->name('stockout');
Route::get('/stockout/getlot/{id}itemController@getLot');
Route::get('/stockout/gettypecost/{id}itemController@getTypeCost');
Route::post('/stockoutitemContriller@stockOut');

//StockOut List
Route::get('stockoutlistitemContriller@stockOutList');

//Update StockOut
Route::get('updatestockout/{id}itemController@editStockOut');
Route::get('/updatestockout/getlot/{id}itemController@getLot');
Route::get('/updatestockout/gettypecost/{id}itemController@getTypeCost');
Route::post('updatestockout/{id}itemController@updateStockOut');

//Delete StockOut
Route::get('deletestockout/{id}itemController@deleteStockOut');