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

Route::get('/', function () {
    return view('welcome');
});

// Account Management.
Auth::routes();

Route::get('/home', 'Wallet\WalletController@init');
Route::post('/item/add', 'Wallet\WalletController@addItem');

// For Product Cart.
Route::get('/cart', 'Wallet\WalletController@cart');
Route::get('/cart/remove/{sku}', 'Wallet\WalletController@cartRemove');

// For Product Checkout.
Route::get('/checkout', 'Wallet\WalletController@checkout');
Route::post('/checkout','Wallet\WalletController@initPayment');

Route::get('/test', 'testController@test');
