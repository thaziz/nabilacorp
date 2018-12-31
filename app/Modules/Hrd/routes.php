<?php

Route::group(['namespace' => 'App\Modules\Hrd\Controllers', 'middleware'=>['web','auth']], function () {
	
	Route::get('/hrd/absensi/index', 'AbsensiController@index')->middleware('auth');
	Route::get('/hrd/absensi/table/manajemen/{tgl_awal}/{tgl_akhir}/', 'AbsensiController@table')->middleware('auth');
	Route::get('/hrd/absensi/peg/save', 'AbsensiController@savePeg');
    Route::get('/hrd/absensi/detail/{tgl1}/{tgl2}/{tampil}', 'AbsensiController@detAbsensi');
});


