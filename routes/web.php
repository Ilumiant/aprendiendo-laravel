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
