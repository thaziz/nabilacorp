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

});
