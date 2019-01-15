<?php

Route::group(['namespace' => 'App\Modules\Hrd\Controllers', 'middleware'=>['web','auth']], function () {
	
//Mahmud Absensi
    Route::get('/hrd/absensi/index', 'AbsensiController@index');
    Route::get('/hrd/absensi/table/manajemen/{tgl1}/{tgl2}/{data}', 'AbsensiController@table');
    Route::get('/hrd/absensi/peg/save', 'AbsensiController@savePeg');
    Route::get('/hrd/absensi/detail/{tgl1}/{tgl2}/{tampil}', 'AbsensiController@detAbsensi');
    Route::post('/import/data-manajemen', 'AbsensiController@importDataManajemen');
    Route::post('/import/data-produksi', 'AbsensiController@importDataProduksi');
    Route::get('/export/id-manajemen', 'AbsensiController@exportManajemen');
    Route::get('/export/id-produksi', 'AbsensiController@exportProduksi');
//Mahmud Setting Payroll
    Route::get('/hrd/payroll/setting-gaji', 'GajiController@settingGajiMan');
    Route::get('/hrd/payroll/datatable-gaji-man', 'GajiController@gajiManData');
    Route::get('/hrd/payroll/tambah-gaji-man', 'GajiController@tambahGajiMan');
    Route::post('/hrd/payroll/simpan-gaji-man', 'GajiController@simpanGajiMan');
    Route::get('/hrd/payroll/edit-gaji-man/{id}', 'GajiController@editGajiMan');
    Route::put('/hrd/payroll/update-gaji-man/{id}', 'GajiController@updateGajiMan');
    Route::get('/hrd/payroll/delete-gaji-man/{id}', 'GajiController@deleteGajiMan');
    Route::get('/hrd/payroll/datatable-gaji-pro', 'GajiController@gajiProData');
    Route::get('/hrd/payroll/tambah-gaji-pro', 'GajiController@tambahGajiPro');
    Route::post('/hrd/payroll/simpan-gaji-pro', 'GajiController@simpanGajiPro');
    Route::get('/hrd/payroll/edit-gaji-pro/{id}', 'GajiController@editGajiPro');
    Route::put('/hrd/payroll/update-gaji-pro/{id}', 'GajiController@updateGajiPro');
    Route::delete('/hrd/payroll/delete-gaji-pro/{id}', 'GajiController@deleteGajiPro');
    Route::get('/hrd/payroll/datatable-potongan', 'GajiController@potonganData');
    Route::get('/hrd/payroll/tambah-potongan', 'GajiController@tambahPotongan');
    Route::post('/hrd/payroll/simpan-potongan', 'GajiController@simpanPotongan');
    Route::get('/hrd/payroll/edit-potongan/{id}', 'GajiController@editPotongan');
    Route::put('/hrd/payroll/update-potongan/{id}', 'GajiController@updatePotongan');
    Route::delete('/hrd/payroll/delete-potongan/{id}', 'GajiController@deletePotongan');
    Route::get('/hrd/payroll/tambah-tunjangan', 'GajiController@tambahTunjangan');
    Route::post('/hrd/payroll/simpan-tunjangan', 'GajiController@simpanTunjangan');
    Route::get('/hrd/payroll/datatable-tunjangan-man', 'GajiController@tunjanganManData');
    Route::get('/hrd/payroll/edit-tunjangan-man/{id}', 'GajiController@editTunjangan');
    Route::post('/hrd/payroll/update-tunjangan/{id}', 'GajiController@updateTunjangan');
    Route::delete('/hrd/payroll/delete-tunjangan/{id}', 'GajiController@deleteTunjangan');
    Route::get('/hrd/payroll/set-tunjangan-pegawai-man', 'GajiController@setTunjanganPegMan');
    Route::get('/hrd/payroll/datatable-tunjangan-pegman', 'GajiController@tunjanganPegManData');
    Route::get('/hrd/payroll/edit-tunjangan-pegman/{id}', 'GajiController@editPegManData');
    Route::post('/hrd/payroll/update-tunjangan-peg/{id}', 'GajiController@updateTunjanganPeg');

});


