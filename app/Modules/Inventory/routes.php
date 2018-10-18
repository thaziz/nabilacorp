<?php

Route::group(['namespace' => 'App\Modules\Inventory\Controllers', 'middleware'=>['web','auth']], function () {
	Route::get('/inventory/pengirimanproduksi/pengirimanproduksi', 'pengirimanproduksiController@indexfix');
	Route::get('/inventory/pengirimanproduksi/tambah', 'pengirimanproduksiController@index');
	Route::get('/inventory/pengirimanproduksi/getdata', 'pengirimanproduksiController@getdata');
	Route::get('/inventory/pengirimanproduksi/simpan', 'pengirimanproduksiController@simpan');
	Route::get('/inventory/pengirimanproduksi/hapus', 'pengirimanproduksiController@hapus');
	Route::get('/inventory/pengirimanproduksi/edit', 'pengirimanproduksiController@edit');
	Route::get('/inventory/pengirimanproduksi/update', 'pengirimanproduksiController@update');
});
