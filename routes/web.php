<?php

use Illuminate\Support\Facades\Session;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('/mlijo', 'MlijoController@index');
Route::get('/penarikandana', 'PenarikanController@index');
Route::post('/aktifasiakun', 'MlijoController@aktivasi');
Route::post('/nonaktifasiakun', 'MlijoController@nonaktivasi');

//mlijo
Route::get('/produk', 'MlijoController@lihatproduk');
Route::post('/produk_add', 'MlijoController@tambahproduk');
Route::post('/produk_detail', 'MlijoController@detailproduk');
Route::post('/produk_edit', 'MlijoController@editproduk');
Route::post('/produk_delete', 'MlijoController@deleteproduk');

Route::get('/setting', 'MlijoController@settingmlijo');
Route::post('/setting_edit', 'MlijoController@settingmlijoedit');
Route::get('/transaksi', 'MlijoController@lihatproduk');

Route::get('/gabung', function () {
    return view('mlijo/gabung');
});

// customer
Route::get('/customers', 'CustomerController@index');
Route::get('/customers_detail', 'CustomerController@detail');
Route::get('/customers_mlijo', 'CustomerController@mlijo');
Route::post('/addChart', 'CustomerController@AddCart');
Route::post('/daftar_customer', 'CustomerController@daftar');
Route::post('/login_customer', 'CustomerController@login');
Route::get('/detail_mlijo', 'CustomerController@detail_mlijo');
Route::get('/chard', 'CustomerController@chard');





Route::post('/gabung', 'RegisterController@permintaan_daftar');



//login
Route::get('native/login', 'AuthNativeController@index');
Route::post('native/login', 'AuthNativeController@auth');
