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

Route::get('/home','HomeController@index');
Route::resource('/admin','AdminController');

Route::get('/register','RegistrationController@create');
Route::post('/register','RegistrationController@store');

Route::get('/login','SessionsController@create');
Route::post('/login','SessionsController@store');
Route::get('/logout','SessionsController@destroy');

Route::resource('/product','ProductController');
Route::resource('/category','CategoryController');
Route::resource('/details','DetailsController');
Route::resource('/order','OrderController');

Route::get('/cart/{id}',[

  'uses' => 'ProductController@getAddToCart',
  'as' => 'product.addToCart'

]);

Route::get('/reduce/{id}',[
  'uses' => 'ProductController@getReduceByOne',
  'as' => 'cart.reduceByOne'
]);

Route::get('/remove/{id}',[
  'uses' => 'ProductController@getRemovedItem',
  'as' => 'cart.removeItem'
]);


Route::get('/shopping-cart',[

  'uses' => 'ProductController@getCart',
  'as' => 'cart.shoppingCart'
]);

Route::get('/checkout',[

  'uses' => 'ProductController@getCheckout',
  'as'  => 'checkout',
]);

Route::post('/checkout',[

  'uses' => 'ProductController@postCheckout',
  'as'  => 'checkout',
]);
