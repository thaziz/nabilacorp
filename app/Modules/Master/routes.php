<?php

Route::group(['namespace' => 'App\Modules\Master\Controllers', 'middleware'=>['web','auth']], function () {

Route::get('/master/item/index', 'itemController@index');
Route::get('/master/item/data-barang', 'itemController@dataBarang');


Route::get('/master/item/tambah', 'itemController@tambah');

Route::get('/master/item/supplier', 'itemController@supplier');

Route::get('/master/item/simpan', 'itemController@simpan');

Route::get('/master/item/edit/{id}', 'itemController@edit');

Route::get('/master/item/update', 'itemController@update');

Route::get('/master/item/hapus', 'itemController@hapus');



//Master Formula Mahmud
    Route::get('/master/masterproduksi/index', 'MasterFormulaController@index');
    Route::get('/produksi/masterformula/table', 'MasterFormulaController@table');
    Route::get('/produksi/masterformula/autocomplete', 'MasterFormulaController@autocompFormula');
    Route::get('/produksi/namaitem/autocomplete', 'MasterFormulaController@autocompNamaItem');
    Route::post('/produksi/namaitem/save/formula', 'MasterFormulaController@saveFormula');
    Route::get('/produksi/namaitem/distroy/formula/{id}', 'MasterFormulaController@distroyFormula');
    Route::get('/produksi/namaitem/view/formula', 'MasterFormulaController@viewFormula');
    Route::get('/produksi/namaitem/edit/formula', 'MasterFormulaController@editFormula');
    Route::post('/produksi/namaitem/update/formula', 'MasterFormulaController@updateFormula');    
//End Master Formula

//mahmud master pegawai
	Route::get('/master/datajabatan', 'JabatanController@index');
	Route::get('/master/datajabatan/data-jabatan', 'Master\JabatanController@jabatanData');
	Route::get('/master/datajabatan/edit-jabatan/{id}', 'Master\JabatanController@editJabatan');
	Route::get('/master/datajabatan/datatable-pegawai/{id}', 'Master\JabatanController@pegawaiData');
	Route::post('/master/datajabatan/simpan-jabatan', 'Master\JabatanController@simpanJabatan');
	Route::put('/master/datajabatan/update-jabatan/{id}', 'Master\JabatanController@updateJabatan');
	Route::get('/master/datajabatan/tambah-jabatan', 'Master\JabatanController@tambahJabatan');
	Route::get('/master/datajabatan/delete-jabatan/{id}', 'Master\JabatanController@deleteJabatan');
	Route::get('/master/datajabatan/tableproduksi', 'Master\JabatanController@tablePro');
	Route::get('/master/datajabatan/tambah-jabatanpro', 'Master\JabatanController@tambahJabatanPro');
	Route::get('datajabatan/simpan-jabatanpro', 'Master\JabatanController@simpanJabatanPro');
	Route::get('datajabatan/hapus-jabatanpro/{id}', 'Master\JabatanController@hapusJabatanPro');
//pegawai
	Route::get('/master/datapegawai/datatable-pegawaipro', 'Master\PegawaiController@pegawaiPro');
	Route::get('/master/datapegawai/tambah-pegawai-pro', 'Master\PegawaiController@tambahPegawaiPro');
	Route::post('/master/datapegawai/simpan-pegawai-pro', 'Master\PegawaiController@simpanPegawaiPro');
	Route::get('/master/datapegawai/edit-pegawai-pro/{id}', 'Master\PegawaiController@editPegawaiPro');
	Route::put('/master/datapegawai/update-pegawai-pro/{id}', 'Master\PegawaiController@updatePegawaiPro');
	Route::delete('/master/datapegawai/delete-pegawai-pro/{id}', 'Master\PegawaiController@deletePegawaiPro');
	Route::post('/master/datapegawai/import-pro', 'Master\PegawaiController@importPegawaiPro');
	Route::get('/master/datapegawai/`import-pro', 'Master\PegawaiController@getFilePro');
	Route::get('/master/datapegawai/pegawai', 'Master\PegawaiController@pegawai')->name('pegawai');
	Route::get('/master/datapegawai/edit-pegawai/{id}', 'Master\PegawaiController@editPegawai');
	Route::put('/master/datapegawai/update-pegawai/{id}', 'Master\PegawaiController@updatePegawai');
	Route::get('/master/datapegawai/datatable-pegawai', 'Master\PegawaiController@pegawaiData');
	Route::get('/master/datapegawai/tambah-pegawai', 'Master\PegawaiController@tambahPegawai');
	Route::get('/master/datapegawai/data-jabatan/{id}', 'Master\PegawaiController@jabatanData');
	Route::post('/master/datapegawai/simpan-pegawai', 'Master\PegawaiController@simpanPegawai');
	Route::delete('/master/datapegawai/delete-pegawai/{id}', 'Master\PegawaiController@deletePegawai');
	Route::post('/master/datapegawai/import', 'Master\PegawaiController@importPegawai');
	Route::get('/master/datapegawai/master-import', 'Master\PegawaiController@getFile');
//end mahmud

});
