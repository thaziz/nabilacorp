<?php

Route::group(['namespace' => 'App\Modules\Inventory\Controllers', 'middleware'=>['web','auth']], function () {
	Route::get('/inventory/pengirimanproduksi/pengirimanproduksi', 'pengirimanproduksiController@index');
	Route::get('/inventory/pengirimanproduksi/getdata', 'pengirimanproduksiController@getdata');
});
