<?php

Route::group(['namespace' => 'App\Modules\Master\Controllers', 'middleware'=>['web','auth']], function () {

Route::get('/master/item/index', 'itemController@index');

Route::get('/master/item/tambah', 'itemController@tambah');

Route::get('/master/item/supplier', 'itemController@supplier');

Route::get('/master/item/simpan', 'itemController@simpan');

Route::get('/master/item/edit/{id}', 'itemController@edit');

Route::get('/master/item/update', 'itemController@update');

Route::get('/master/item/hapus', 'itemController@hapus');

});
