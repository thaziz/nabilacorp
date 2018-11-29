<?php

Route::group(['namespace' => 'App\Modules\Inventory\Controllers', 'middleware'=>['web','auth']], function () {
	//versi lama
	// Route::get('/inventory/pengirimanproduksi/pengirimanproduksi', 'pengirimanproduksiController@indexfix');
	// Route::get('/inventory/pengirimanproduksi/tambah', 'pengirimanproduksiController@index');
	// Route::get('/inventory/pengirimanproduksi/getdata', 'pengirimanproduksiController@getdata');
	// Route::get('/inventory/pengirimanproduksi/simpan', 'pengirimanproduksiController@simpan');
	// Route::get('/inventory/pengirimanproduksi/hapus', 'pengirimanproduksiController@hapus');
	// Route::get('/inventory/pengirimanproduksi/edit', 'pengirimanproduksiController@edit');
	// Route::get('/inventory/pengirimanproduksi/update', 'pengirimanproduksiController@update');
	//versi baru
	Route::get('/inventory/pengirimanproduksi/pengirimanproduksi', 'PengambilanItemController@index');
	Route::get('/produksi/suratjalan/create/delivery/{comp}', 'PengambilanItemController@tabelDelivery');
	Route::get('/produksi/pengambilanitem/kirim/tabel/{tgl1}/{tgl2}/{comp}', 'PengambilanItemController@tabelKirim');
	Route::get('/produksi/pengambilanitem/cari/tabel/{tgl1}/{tgl2}/{comp}', 'PengambilanItemController@cariTabelKirim');
	Route::get('/produksi/suratjalan/save', 'PengambilanItemController@store');

	Route::get('/inventory/p_hasilproduksi/produksi', 'penerimaanController@index');
	Route::get('/inventory/p_hasilproduksi/getdata', 'penerimaanController@getdata');
	Route::get('/inventory/p_hasilproduksi/terima', 'penerimaanController@terima');


	Route::get('/inventory/mutasiitembaku/index', 'mutasiitembakuController@index');
	Route::get('/inventory/mutasiitembaku/searchItem', 'mutasiitembakuController@searchItem');
	Route::get('/inventory/mutasiitembaku/data-mutasi', 'mutasiitembakuController@dataMutasiItem');
	Route::get('/inventory/mutasiitembaku/tambah-mutasi-item', 'mutasiitembakuController@tambahMutasiItem');
	Route::get('/inventory/mutasiitembaku/store', 'mutasiitembakuController@store');
	Route::get('/inventory/mutasiitembaku/perbarui/{id}', 'mutasiitembakuController@perbarui');
	Route::get('/inventory/mutasiitembaku/mutasi-item-detail/{id}', 'mutasiitembakuController@mutasiItemDt');
	Route::get('/inventory/mutasiitembaku/destroy/{id}', 'mutasiitembakuController@destroy');

//mahmud opnme
	Route::get('/inventory/stockopname/opname', 'stockOpnameController@index');
	Route::get('/inventory/namaitem/autocomplite/{comp}/{position}', 'stockOpnameController@tableOpname');
	Route::get('/inventory/namaitem/simpanopname', 'stockOpnameController@saveOpname');
	Route::get('/inventory/namaitem/history/{tgl1}/{tgl2}', 'stockOpnameController@history');
	Route::get('/inventory/namaitem/detail', 'stockOpnameController@getOPname');
	Route::get('/inventory/stockopname/print_stockopname/{id}', 'stockOpnameController@print_stockopname');
	

});
