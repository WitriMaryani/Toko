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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'pemilik','middleware'=>['auth','role:admin']], function(){
	Route::resource('karyawan','KaryawanController');
});
Route::group(['prefix'=>'karyawan','middleware'=>['auth','role:karyawan']], function(){
	Route::resource('barang','BarangController');	
	Route::resource('pelanggan','PelangganController');
	Route::resource('transaksi','TransaksiController');
});