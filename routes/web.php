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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/','ArticleController@index');
Route::get('/home','ArticleController@index2');
Route::post('/store','ArticleController@store');
Route::get('/{guestId}/edit','ArticleController@edit');
Route::post('/{guestId}/update','ArticleController@update');
Route::get('/{guestId}/delete','ArticleController@destroy');


// Route::get('/','CategoryController@index');
// Route::post('/store','CategoryController@store');
// Route::get('/{guestId}/edit','CategoryController@edit');
// Route::post('/{guestId}/update','CategoryController@update');
// Route::get('/{guestId}/delete','CategoryController@destroy');