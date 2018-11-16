<?php

Route::group(['namespace' => 'App\Modules\Keuangan\Controllers', 'middleware'=>['web','auth']], function () {
	Route::get('/keuangan/spk/spk', 'spkFinancialController@spk');
	Route::get('/keuangan/spk/get-data-tabel-index', 'spkFinancialController@getDataTabelIndex');
	Route::get('/produksi/spk/create-id/{x}', 'spkFinancialController@spkCreateId');
	Route::get('/produksi/lihatadonan/tabel/{id}/{qty}', 'spkFinancialController@tabelFormula');
	Route::get('/produksi/spk/draft/simpan-spk', 'spkFinancialController@simpanDraftSpk');
	Route::get('/keuangan/spk/get-data-tabel-spk/{tgl1}/{tgl2}/{tampil}', 'spkFinancialController@getDataTabelSpk');
	Route::get('/produksi/spk/edit/{id}', 'spkFinancialController@editSpk');
});

