<?php
Route::group(['namespace' => 'App\Modules\Nabila\Controllers', 'middleware'=>['web','auth']], function () {
	// Nabila Moslem

	// Section membership
	Route::get('/nabila/membership/member', 'MemberController@index')->middleware('auth')->name('customer');
	Route::get('/nabila/membership/get_data_all', 'MemberController@get_data_all')->middleware('auth');
	Route::get('/nabila/membership/get_data_active', 'MemberController@get_data_active')->middleware('auth');
	Route::get('/nabila/membership/get_data_nonactive', 'MemberController@get_data_nonactive')->middleware('auth');
	Route::post('/nabila/membership/simpan_tambah', 'MemberController@simpan_tambah')->middleware('auth')->name('insert_m_customer');
	Route::post('/nabila/membership/simpan_edit', 'MemberController@simpan_edit')->middleware('auth')->name('update_m_customer');
	Route::get('/nabila/membership/form_insert', 'MemberController@form_insert')->middleware('auth')->name('form_insert_customer');
	Route::get('/nabila/membership/form_alter/{id}', 'MemberController@form_alter')->middleware('auth')->name('form_alter_customer');
	Route::get('/nabila/membership/preview/{id}', 'MemberController@preview')->middleware('auth')->name('preview_customer');
	Route::get('/nabila/membership/delete/{id}', 'MemberController@delete')->middleware('auth')->name('delete_m_customer');

	// =========================================================================================



	Route::get('/nabila/belanjakaryawan/index', 'BelanjaKaryawanController@posPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/create', 'BelanjaKaryawanController@create')->middleware('auth');
Route::get('/nabila/belanjakaryawan/update', 'BelanjaKaryawanController@update')->middleware('auth');
Route::get('/nabila/belanjakaryawan/serah-terima', 'BelanjaKaryawanController@serahTerima')->middleware('auth');

Route::get('/nabila/belanjakaryawan/{id}/edit', 'BelanjaKaryawanController@nabilaDtPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/detail-view/{id}', 'BelanjaKaryawanController@nabilaViewDtPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/listPenjualan', 'BelanjaKaryawanController@listPenjualanPesanan')->middleware('auth');
Route::post('/nabila/belanjakaryawan/listPenjualan', 'BelanjaKaryawanController@listPenjualanPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/listPenjualan/data', 'BelanjaKaryawanController@listPenjualanDataPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/printNota/{id}', 'BelanjaKaryawanController@printNotaPesanan')->middleware('auth');
Route::get('/nabila/belanjakaryawan/find_pegawai', 'BelanjaKaryawanController@find_pegawai')->middleware('auth');



	Route::get('/nabila/voucherbelanja/voucher', 'NabilaController@voucher')->middleware('auth');
	Route::get('/nabila/reseller/reseller', 'NabilaController@reseller')->middleware('auth');
	Route::get('/nabila/marketer/marketer', 'NabilaController@marketer')->middleware('auth');
	Route::get('/nabila/return/return', 'NabilaController@return')->middleware('auth');
	Route::get('/nabila/purchasing/purchasing', 'NabilaController@purchasing')->middleware('auth');
	

});

