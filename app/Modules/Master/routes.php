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

//data supplier
    Route::get('/master/datasuplier/suplier', 'SuplierController@suplier')->name('suplier');    
    Route::post('master/datasuplier/suplier_proses', 'SuplierController@suplier_proses');
    Route::get('/master/datasuplier/tambah_suplier', 'SuplierController@tambah_suplier');
    Route::get('master/datasuplier/datatable_suplier', 'SuplierController@datatable_suplier')->name('datatable_suplier');
    Route::get('master/datasuplier/suplier_edit/{s_id}', 'SuplierController@suplier_edit');
    Route::post('master/datasuplier/suplier_edit_proses/{s_id}', 'SuplierController@suplier_edit_proses');
    Route::get('master/datasuplier/suplier_hapus', 'SuplierController@suplier_hapus');
//data supplier selesai


//customer
    Route::get('/master/datacust/cust', 'custController@cust')->name('cust');
    Route::get('/master/datacust/tambah_cust', 'custController@tambah_cust')->name('tambah_cust');
    Route::get('/master/datacust/simpan_cust', 'custController@simpan_cust')->name('simpan_cust');
    Route::get('/master/datacust/hapus_cust', 'custController@hapus_cust')->name('hapus_cust');
    Route::get('/master/datacust/edit_cust', 'custController@edit_cust')->name('edit_cust');
    Route::get('/master/datacust/update_cust', 'custController@update_cust')->name('update_cust');
    Route::get('/master/datacust/datatable_cust', 'custController@datatable_cust')->name('datatable_cust');
//customer selesai




});
