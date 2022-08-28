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

  // rutas PDFs 
  Route::get('books/pdf', "BookController@pdf")->name('books.pdf');

  //rutas users
  Route::get('users', "UserController@index")->name('users');

  //esta son las rutas de profile
  Route::get('users/profile', "ProfileController@index")->name('profiles');
  Route::get('users/profile/create', "ProfileController@create")->name('profiles.crete');
  Route::post('users/profile/store', "ProfileController@store")->name('profiles.store');
  Route::get('users/profile/edit', "ProfileController@edit")->name('profiles.edit');
  Route::get('users/profile/{id}', "ProfileController@show")->name('profiles.show');
  Route::put('users/profile/update', "ProfileController@update")->name('profiles.update');
  Route::delete('users/profile/{id}', "ProfileController@destroy")->name('profiles.destroy');

  // rutas products
  Route::get('products', "ProductController@index")/*->middleware('can:users.index')*/->name('products');
  Route::get('products/create', "ProductController@create")->name('products.create');
  Route::post('products/store', "ProductController@store")->name('products.store');
  Route::get('products/{id}', "ProductController@show")->name('products.show');
  Route::get('products/{id}/edit', "ProductController@edit")->name('products.edit');
  Route::put('products/{id}', "ProductController@update")->name('products.update');
  Route::delete('products/{id}', "ProductController@destroy")->name('products.destroy');

  //rutas books
  Route::get('books', "BookController@index")->name('books');
  Route::get('books/create', "BookController@create")->name('books.create');
  Route::post('books/store', "BookController@store")->name('books.store');
  Route::get('books/{id}', "BookController@show")->name('books.show')->middleware('check-private-book');
  Route::get('books/{id}/edit', "BookController@edit")->name('books.edit')->middleware('check-private-book');
  Route::put('books/{id}', "BookController@update")->name('books.update')->middleware('check-private-book');
  Route::delete('books/{id}', "BookController@destroy")->name('books.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
