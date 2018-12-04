<?php

Route::group(['namespace' => 'App\Modules\Purchase\Controllers', 'middleware'=>['web','auth']], function () {	
	/*Purchasing plan*/	
Route::get('/seach-item-purchase', 'purchasePlanController@seachItemPurchase')->middleware('auth');
Route::get('/purcahse-plan/plan-index', 'purchasePlanController@planIndex')->middleware('auth');
Route::get('/purcahse-plan/data-plan', 'purchasePlanController@dataPlan')->middleware('auth');
Route::get('/purcahse-plan/get-detail-plan/{id}/{type}', 'purchasePlanController@getDetailPlan')->middleware('auth');
Route::get('/purcahse-plan/get-edit-plan/{id}', 'purchasePlanController@getEditPlan')->middleware('auth');

Route::get('/purcahse-plan/update-plan', 'purchasePlanController@updatePlan')->middleware('auth');
Route::get('/purcahse-plan/get-delete-plan/{id}', 'purchasePlanController@deletePlan')->middleware('auth');

//keuangan
Route::get('/konfirmasi-purchase/index', 'PurchaseConfirmController@confirmIndex')->middleware('auth');
Route::get('/konfirmasi-purchase/purchase-plane/data', 'PurchaseConfirmController@getDataRencanaPembelian')->middleware('auth');
Route::get('/konfirmasi-purchase/purchase-plane/data/confirm-plan/{id}/{type}', 'PurchaseConfirmController@confirmRencanaPembelian')->middleware('auth');

Route::get('/konfirmasi-purchase/purchase-plane/data/confirm-purchase-plan', 'PurchaseConfirmController@konfirmasiPurchasePlan')->middleware('auth');




	/*Purchasing order*/	
Route::get('/purcahse-order/order-index', 'purchaseOrderController@orderIndex')->middleware('auth');
Route::get('/purcahse-order/data-order', 'purchaseOrderController@dataOrder')->middleware('auth');
Route::get('/purcahse-order/form-order', 'purchaseOrderController@formOrder')->middleware('auth');
Route::get('/purcahse-order/get-data-form/{id}', 'purchaseOrderController@getDataForm')->middleware('auth');
Route::get('/purcahse-order/get-data-code-plan', 'purchaseOrderController@getDataCodePlan')->middleware('auth');
Route::get('/purcahse-order/seach-supplier', 'purchaseOrderController@seachSupplier')->middleware('auth');



Route::get('/purcahse-plan/get-detail-plan/{id}/{type}', 'purchasePlanController@getDetailPlan')->middleware('auth');
Route::get('/purcahse-plan/get-edit-plan/{id}', 'purchasePlanController@getEditPlan')->middleware('auth');
Route::delete('/purcahse-plan/get-delete-plan/{id}', 'purchasePlanController@deletePlan')->middleware('auth');



Route::get('/purcahse-plan/store-plan', 'purchasePlanController@storePlan')->middleware('auth');

Route::get('/purcahse-plan/form-plan', 'purchasePlanController@formPlan')->middleware('auth');



Route::get('/purchasing/rencanapembelian/rencana', 'PurchasingController@rencana')->middleware('auth');
Route::get('/purchasing/rencanapembelian/create', 'PurchasingController@create')->middleware('auth');
Route::get('/purchasing/returnpembelian/pembelian', 'PurchasingController@pembelian')->middleware('auth');
Route::get('/purchasing/belanjasuplier/suplier', 'PurchasingController@suplier')->middleware('auth');
Route::get('/purchasing/belanjalangsung/langsung', 'PurchasingController@langsung')->middleware('auth');
Route::get('/purchasing/belanjaproduk/produk', 'PurchasingController@produk')->middleware('auth');
Route::get('/purchasing/belanjaharian/belanja', 'PurchasingController@belanja')->middleware('auth');
Route::get('/purchasing/belanjaharian/tambah_belanja', 'PurchasingController@tambah_belanja')->middleware('auth');
Route::get('/purchasing/returnpembelian/tambah_pembelian', 'PurchasingController@tambah_pembelian')->middleware('auth');
Route::get('/purchasing/rencanabahanbaku/bahan', 'PurchasingController@bahan')->middleware('auth');
/* ricky */
Route::get('/purchasing/belanjapasar/pasar', 'PurchasingController@pasar')->middleware('auth');
/*----*/
});

