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

//Route::get('/', function () {
  //  return view('welcome');
//});


Auth::routes(); 
  
Route::get('/', 'ProductsController@index')->name('product');
Route::post('/placeorder', 'ProductsController@placeorder')->name('placeorder');
Route::get('/cartdetails', 'ProductsController@cartdetails')->name('cartdetails');
Route::post('products/addtocart', 'ProductsController@addtocart')->name('addtocart');
Route::get('/products', 'ProductsController@index')->name('product');
Route::get('products/show/{id}', 'ProductsController@show')->name('show');
// Route::get('/show', 'ProductsController@show')->name('show');
Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
