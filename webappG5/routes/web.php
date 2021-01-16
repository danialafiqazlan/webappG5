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

Route::resource('/item', 'App\Http\Controllers\itemController@items.master');
Route::get('/error', 'App\Http\Controllers\errorController@errors.404');