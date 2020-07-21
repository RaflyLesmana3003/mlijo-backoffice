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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//admin
Route::get('/mlijo','MlijoController@index');
Route::get('/penarikandana','PenarikanController@index');
Route::post('/aktifasiakun', 'MlijoController@aktivasi');
Route::post('/nonaktifasiakun', 'MlijoController@nonaktivasi');

//mlijo
Route::get('/produk','MlijoController@lihatproduk');

Route::get('/gabung', function () {
    return view('mlijo/gabung');
});

Route::post('/gabung', 'MlijoController@permintaan_daftar');



//login
Route::get('native/login','AuthNativeController@index');
Route::post('native/login','AuthNativeController@auth');