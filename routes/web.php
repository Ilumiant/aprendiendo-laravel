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

Route::get('hello', function () {
  return "Hello World!";
});

Route::get('hello-world', function () {
  $title = "Hello guys";
  return view('hello_world', compact('title'));
});

Route::get('products', "ProductController@index");


Route::get('products2', "ProductController@index2");
Route::get('products/create', "ProductController@create");
Route::post('products/store', "ProductController@store");
Route::post('products/store2', "ProductController@store2");
Route::get('products/{id}', "ProductController@show");
Route::get('products/{id}/edit', "ProductController@edit");
Route::put('products/{id}', "ProductController@updaProductte");

Route::delete('products/{id}', "ProductController@destroy");

Route::get('users', "UserController@index");
