<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('first');
// });

Route::get('/','App\Http\Controllers\PageController@first');
Route::get('/addProducts','App\Http\Controllers\PageController@addProducts');
Route::post('/storeProducts','App\Http\Controllers\PageController@storeProducts');
Route::get('/editProducts/{id}','App\Http\Controllers\PageController@editProducts');
Route::post('/updateProducts/{id}','App\Http\Controllers\PageController@updateProducts');
Route::get('/deleteProducts/{id}','App\Http\Controllers\PageController@deleteProducts');