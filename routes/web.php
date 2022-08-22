<?php

use Illuminate\Support\Facades\Auth;
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


Route::middleware(['auth'])->group(function () {

  Route::get('products', "ProductController@index")->name('products');
  Route::get('products/create', "ProductController@create");
  Route::post('products/store', "ProductController@store");
  Route::get('products/{id}', "ProductController@show");
  Route::get('products/{id}/edit', "ProductController@edit");
  Route::put('products/{id}', "ProductController@update");
  Route::delete('products/{id}', "ProductController@destroy");

  Route::get('users', "UserController@index")->name('users');

//esta son las rutas de profile
  Route::get('users/profile', "ProfileController@index");

  Route::get('users/profile/create', "ProfileController@create");
  Route::post('users/profile/store', "ProfileController@store");

  Route::get('users/profile/edit', "ProfileController@edit");
  Route::get('users/profile/{id}', "ProfileController@show");
  Route::put('users/profile/update', "ProfileController@update");

  Route::delete('users/profile/{id}', "ProfileController@destroy");


});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
