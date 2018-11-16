<?php

Route::group(['namespace' => 'App\Modules\Produksi\Controllers', 'middleware'=>['web','auth']], function () {
	
/* Rencana Produksi */
    Route::get('/produksi/rencanaproduksi/tabel','RencanaProduksiController@tabel');
    Route::get('/produksi/rencanaproduksi/produksi','RencanaProduksiController@produksi');
    Route::get('/produksi/rencanaproduksi/save','RencanaProduksiController@save');
    Route::get('/produksi/rencanaproduksi/hapus_rencana/{id}','RencanaProduksiController@hapus_rencana');
    Route::patch('/produksi/rencanaproduksi/produksi/edit_rencana','RencanaProduksiController@edit_rencana');
    Route::get('/produksi/rencanaproduksi/produksi/autocomplete','RencanaProduksiController@autocomplete');
/* Hasil Rencana Produksi */

	/*spk*/
		Route::get('/produksi/spk/spk', 'spkProductionController@spk');
		Route::get('/produksi/spk/get_spk_by_tgl/{tgl1}/{tgl2}', 'spkProductionController@getSpkByTgl');
		Route::get('/produksi/spk/get_spk_by_tglCL/{tgl1}/{tgl2}', 'spkProductionController@getSpkByTglCL');
	/* selesai spk*/

		/*Route::get('/produksi/rencanaproduksi/produksi', 'produksiController@produksi')->middleware('auth');*/
		
		Route::get('/produksi/bahanbaku/baku', 'ProduksiController@baku')->middleware('auth');
		Route::get('/produksi/sdm/sdm', 'ProduksiController@sdm')->middleware('auth');
		Route::get('/produksi/produksi/produksi2', 'ProduksiController@produksi2')->middleware('auth');
		
		Route::get('/produksi/waste/waste', 'ProduksiController@waste')->middleware('auth');
		Route::get('/produksi/monitoringprogress/monitoring', 'ProduksiController@monitoring')->middleware('auth');
		Route::get('/produksi/o_produksi/tambah_produksi', 'ProduksiController@tambah_produksi')->middleware('auth');

		//ITEM PRODUKSI
		Route::get('/seach-item-Produksi', 'hasilProduksiController@seachItemProduksi');
		Route::get('/seach-item-mutasi', 'hasilProduksiController@seachItemMutasi');
		

		Route::get('/produksi/hasil-produksi/index', 'hasilProduksiController@index')->middleware('auth');
		Route::get('/produksi/hasil-produksi/data', 'hasilProduksiController@data')->middleware('auth');
		Route::get('/produksi/hasil-produksi/create', 'hasilProduksiController@create')->middleware('auth');

		Route::POST('/produksi/hasil-produksi/create', 'hasilProduksiController@create')->middleware('auth');

		Route::get('/produksi/hasil-produksi/edit-detail/{id}/edit', 'hasilProduksiController@editDetail')->middleware('auth');		


		Route::get('/produksi/hasil-produksi/detail/{id}', 'hasilProduksiController@detail')->middleware('auth');		

		Route::POST('/produksi/hasil-produksi/update/{id}', 'hasilProduksiController@updateData')->middleware('auth');

		Route::get('/produksi/hasil-produksi/update/{id}', 'hasilProduksiController@updateData')->middleware('auth');

		Route::get('/produksi/hasil-produksi/destroy/{id}', 'hasilProduksiController@destroy')->middleware('auth');

		
		


		
		
		
//coba print qz
Route::get('/penjualan/pos-toko/printNote/{id}', 'ProduksiController@printNota')->middleware('auth');

});

