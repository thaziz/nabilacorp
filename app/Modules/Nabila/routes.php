<?php

Route::group(['namespace' => 'App\Modules\Nabila\Controllers', 'middleware'=>['web','auth']], function () {
	// Nabila Moslem

	// Section membership
	Route::get('/nabila/membership/member', 'MemberController@index')->middleware('auth');
	Route::get('/nabila/membership/get_data_all', 'MemberController@get_data_all')->middleware('auth');
	Route::get('/nabila/membership/get_data_active', 'MemberController@get_data_active')->middleware('auth');
	Route::get('/nabila/membership/get_data_nonactive', 'MemberController@get_data_nonactive')->middleware('auth');
	Route::get('/nabila/membership/simpan_tambah', 'MemberController@simpan_tambah')->middleware('auth');
	Route::get('/nabila/membership/simpan_edit', 'MemberController@simpan_edit')->middleware('auth');
	Route::get('/nabila/membership/form_insert', 'MemberController@form_insert')->middleware('auth');
	Route::get('/nabila/membership/form_alter/{id}', 'MemberController@form_alter')->middleware('auth');
	Route::get('/nabila/membership/delete/{id}', 'MemberController@delete')->middleware('auth');

	// =========================================================================================

	Route::get('/nabila/belanjakaryawan/belanja', 'NabilaController@belanja')->middleware('auth');
	Route::get('/nabila/voucherbelanja/voucher', 'NabilaController@voucher')->middleware('auth');
	Route::get('/nabila/reseller/reseller', 'NabilaController@reseller')->middleware('auth');
	Route::get('/nabila/marketer/marketer', 'NabilaController@marketer')->middleware('auth');
	Route::get('/nabila/return/return', 'NabilaController@return')->middleware('auth');
	Route::get('/nabila/purchasing/purchasing', 'NabilaController@purchasing')->middleware('auth');
	
});

