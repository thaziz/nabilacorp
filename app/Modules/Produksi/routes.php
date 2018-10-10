<?php

Route::group(['namespace' => 'App\Modules\Produksi\Controllers', 'middleware'=>['web','auth']], function () {
	/*Produksi*/
/*	Route::get('/produksi/rencanaproduksi/produksi', function () {
	return view('auth.login');
})->name('auth');*/

		Route::get('/produksi/rencanaproduksi/produksi', 'produksiController@produksi')->middleware('auth');
		Route::get('/produksi/spk/spk', 'ProduksiController@spk')->middleware('auth');
		Route::get('/produksi/bahanbaku/baku', 'ProduksiController@baku')->middleware('auth');
		Route::get('/produksi/sdm/sdm', 'ProduksiController@sdm')->middleware('auth');
		Route::get('/produksi/produksi/produksi2', 'ProduksiController@produksi2')->middleware('auth');
		
		Route::get('/produksi/waste/waste', 'ProduksiController@waste')->middleware('auth');
		Route::get('/produksi/monitoringprogress/monitoring', 'ProduksiController@monitoring')->middleware('auth');
		Route::get('/produksi/o_produksi/tambah_produksi', 'ProduksiController@tambah_produksi')->middleware('auth');

		Route::get('/produksi/hasil-produksi/index', 'hasilProduksiController@index')->middleware('auth');
		Route::get('/produksi/hasil-produksi/data', 'hasilProduksiController@data')->middleware('auth');
		Route::get('/produksi/hasil-produksi/create', 'hasilProduksiController@create')->middleware('auth');

		Route::get('/produksi/hasil-produksi/edit-detail/{id}/edit', 'hasilProduksiController@editDetail')->middleware('auth');		


		Route::get('/produksi/hasil-produksi/detail/{id}', 'hasilProduksiController@detail')->middleware('auth');		

		Route::get('/produksi/hasil-produksi/update/{id}', 'hasilProduksiController@updateData')->middleware('auth');

		Route::get('/produksi/hasil-produksi/destroy/{id}', 'hasilProduksiController@destroy')->middleware('auth');

		
		


		
		
		
//coba print qz
Route::get('/penjualan/pos-toko/printNote/{id}', 'ProduksiController@printNota')->middleware('auth');

});

