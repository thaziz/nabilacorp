<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
  /*  Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');*/

Route::group(['middleware' => ['guest', 'web']], function() {
Route::get('/', function () {
	return view('auth.login');
})->name('login');
/*Route::get('/', 'loginController@authenticate');*/

Route::get('login', 'loginController@authenticate');
Route::post('login', 'loginController@authenticate');
/*Route::post('/login', [ 'as' => 'login', 'uses' => 'loginController@authenticate']);*/

});
Route::group(['middleware' => ['auth', 'web']], function() {

Route::get('/session-set-comp/{id}','mMemberController@setComp');
Route::get('not-allowed', 'mMemberController@notAllowed');
Route::get('logout', 'mMemberController@logout');

/*Auth::routes();*/
Route::get('/seach-supplier', 'supplierController@datasupplier');

Route::get('/home', 'HomeController@index')->name('home');

/*Master*/
Route::get('/master/datasuplier/suplier', 'MasterController@suplier')->middleware('auth');
/* ari */
Route::get('/master/datacust/cust', 'MasterController@cust')->middleware('auth');
Route::get('/getdata', 'MasterController@getdata')->middleware('auth');
Route::get('/master/datacust/simpan_cust', 'MasterController@simpan_cust')->middleware('auth');

Route::get('/master/datacust/cust_edit/{id_cus_ut}', 'MasterController@cust_edit')->middleware('auth');
Route::get('/master/datacust/cust_edit/cust_edit_proses/{id_cus_ut}', 'MasterController@cust_edit_proses')->middleware('auth');
Route::get('/master/datacust/cust_delete/{id_cus_ut}', 'MasterController@cust_delete')->middleware('auth');
/*---------*/
Route::get('/master/databaku/baku', 'MasterController@baku')->middleware('auth');
Route::get('/master/databaku/tambah_baku', 'MasterController@tambah_baku')->middleware('auth');
Route::get('/master/datajenis/jenis', 'MasterController@jenis')->middleware('auth');
Route::get('/master/datajenis/tambah_jenis', 'MasterController@tambah_jenis')->middleware('auth');
Route::get('/master/datapegawai/pegawai', 'MasterController@pegawai')->middleware('auth');
Route::get('/master/datakeuangan/keuangan', 'MasterController@keuangan')->middleware('auth');
Route::get('/master/datatransaksi/transaksi', 'MasterController@transaksi')->middleware('auth');
Route::get('/master/datasuplier/tambah_suplier', 'MasterController@tambah_suplier')->middleware('auth');
Route::get('/master/datacust/tambah_cust', 'MasterController@tambah_cust')->middleware('auth');
Route::get('/master/datatransaksi/tambah_transaksi', 'MasterController@tambah_transaksi')->middleware('auth');
Route::get('/master/datapegawai/tambah_pegawai', 'MasterController@tambah_pegawai')->middleware('auth');

Route::get('/master/databarang/barang', 'MasterController@barang')->middleware('auth');
Route::get('/master/databarang/tambah_barang', 'MasterController@tambah_barang')->middleware('auth');


/*Inventory*/
Route::get('/inventory/p_suplier/suplier', 'InventoryController@suplier')->middleware('auth');
Route::get('/inventory/p_hasilproduksi/produksi', 'InventoryController@produksi')->middleware('auth');
Route::get('/inventory/p_returncustomer/cust', 'InventoryController@cust')->middleware('auth');
Route::get('/inventory/b_digunakan/barang', 'InventoryController@barang')->middleware('auth');
Route::get('/inventory/stockopname/opname', 'InventoryController@opname')->middleware('auth');
Route::get('/inventory/p_suplier/cari_nota', 'InventoryController@cari_nota_sup')->middleware('auth');
Route::get('/inventory/p_hasilproduksi/cari_nota', 'InventoryController@cari_nota_produksi')->middleware('auth'); 
Route::get('/inventory/p_returncustomer/cari_nota', 'InventoryController@cari_nota_cust')->middleware('auth');
Route::get('/inventory/b_digunakan/tambah_barang', 'InventoryController@tambah_barang')->middleware('auth');
Route::get('/inventory/stockopname/tambah_opname', 'InventoryController@tambah_opname')->middleware('auth');

/*Produksi*/
/*Route::get('/produksi/rencanaproduksi/produksi', 'ProduksiController@produksi')->middleware('auth');
Route::get('/produksi/spk/spk', 'ProduksiController@spk')->middleware('auth');
Route::get('/produksi/bahanbaku/baku', 'ProduksiController@baku')->middleware('auth');
Route::get('/produksi/sdm/sdm', 'ProduksiController@sdm')->middleware('auth');
Route::get('/produksi/produksi/produksi2', 'ProduksiController@produksi2')->middleware('auth');
Route::get('/produksi/o_produksi/produksi3', 'ProduksiController@produksi3')->middleware('auth');
Route::get('/produksi/waste/waste', 'ProduksiController@waste')->middleware('auth');
Route::get('/produksi/monitoringprogress/monitoring', 'ProduksiController@monitoring')->middleware('auth');
Route::get('/produksi/o_produksi/tambah_produksi', 'ProduksiController@tambah_produksi')->middleware('auth');*/

/*Penjualan
Route::get('/penjualan/manajemenharga/harga', 'PenjualanController@harga')->middleware('auth');
Route::get('/penjualan/manajemenpromosi/promosi', 'PenjualanController@promosi')->middleware('auth');
Route::get('/penjualan/layananpesanan/layananpesanan', 'PenjualanController@layananpesanan')->middleware('auth');

Route::get('/penjualan/POSpenjualan/POSpenjualan', 'PenjualanController@POSpenjualan')->middleware('auth');
Route::get('/penjualan/manajemenreturn/r_penjualan', 'PenjualanController@r_penjualan')->middleware('auth');
Route::get('/penjualan/monitorprogress/progress', 'PenjualanController@progress')->middleware('auth');
Route::get('/penjualan/rencanapenjualan/tambah_rencana', 'PenjualanController@tambah_rencana')->middleware('auth');
Route::get('/penjualan/monitoringorder/monitoring', 'PenjualanController@monitoringorder')->middleware('auth');
Route::get('/penjualan/mutasistok/mutasi', 'PenjualanController@mutasi')->middleware('auth');
Route::get('/penjualan/layananpesanan/tambah_layananpesanan', 'PenjualanController@tambah_layananpesanan')->middleware('auth');
Route::get('/penjualan/POSpenjualanmobile/POSpenjualanmobile', 'PenjualanController@POSpenjualanmobile')->middleware('auth');
Route::get('/penjualan/produklangsung/produklangsung', 'PenjualanController@produklangsung')->middleware('auth');
Route::get('/penjualan/penjualanexpired/penjualanexpired', 'PenjualanController@penjualanexpired')->middleware('auth');
Route::get('/penjualan/repackaging/repackaging', 'PenjualanController@repackaging')->middleware('auth');
Route::get('/penjualan/POSpenjualankonsinyasi/POSpenjualankonsinyasi', 'PenjualanController@POSpenjualankonsinyasi')->middleware('auth');
Route::get('/penjualan/POSpenjualanpesanan/POSpenjualanpesanan', 'PenjualanController@POSpenjualanPesanan')->middleware('auth');
Route::get('/penjualan/POSpenjualanToko/POSpenjualanToko', 'PenjualanController@POSpenjualanToko')->middleware('auth');
Route::get('/penjualan/penjualanmobile/penjualanmobile', 'PenjualanController@penjualanmobile')->middleware('auth');
*/
//POSRetail
Route::get('/penjualan/POSretail/retail', 'Penjualan\POSRetailController@retail')->middleware('auth');
Route::get('/penjualan/POSretail/retail/store', 'Penjualan\POSRetailController@store')->middleware('auth');
Route::get('/penjualan/POSretail/retail/autocomplete', 'Penjualan\POSRetailController@autocomplete')->middleware('auth');
Route::get('/penjualan/POSretail/retail/setnama/{id}', 'Penjualan\POSRetailController@setnama')->middleware('auth');
Route::get('/penjualan/POSretail/retail/sal_save', 'Penjualan\POSRetailController@sal_save')->middleware('auth');
Route::get('/penjualan/POSretail/retail/create', 'Penjualan\POSRetailController@create')->middleware('auth');
Route::get('/penjualan/POSretail/retail/create_sal', 'Penjualan\POSRetailController@create_sal')->middleware('auth');
Route::get('/penjualan/POSretail/retail/edit_sales/{id}', 'Penjualan\POSRetailController@edit_sales')->middleware('auth');
Route::get('/penjualan/POSretail/retail/distroy/{id}', 'Penjualan\POSRetailController@distroy')->middleware('auth');
Route::get('/penjualan/POSretail/retail/update/{id}', 'Penjualan\POSRetailController@update')->middleware('auth');

/*HRD*/
Route::get('/hrd/manajemenkpipegawai/kpi', 'HrdController@kpi')->middleware('auth');
Route::get('/hrd/payroll/payroll', 'HrdController@payroll')->middleware('auth');
Route::get('/hrd/recruitment/rekrut', 'HrdController@rekrut')->middleware('auth');
Route::get('/hrd/datakaryawan/karyawan', 'HrdController@karyawan')->middleware('auth');
Route::get('/hrd/dataadministrasi/admin', 'HrdController@admin')->middleware('auth');
Route::get('/hrd/datalembur/lembur', 'HrdController@lembur')->middleware('auth');
Route::get('/hrd/scoreboard/score', 'HrdController@score')->middleware('auth');
Route::get('/hrd/training/training', 'HrdController@training')->middleware('auth');

/*Keuangan*/
Route::get('/keuangan/p_inputtransaksi/transaksi', 'KeuanganController@transaksi')->middleware('auth');
Route::get('/keuangan/l_hutangpiutang/hutang', 'KeuanganController@hutang')->middleware('auth');
Route::get('/keuangan/l_jurnal/jurnal', 'KeuanganController@jurnal')->middleware('auth');
Route::get('/keuangan/analisaprogress/analisa', 'KeuanganController@analisa')->middleware('auth');
Route::get('/keuangan/analisaocf/analisa2', 'KeuanganController@analisa2')->middleware('auth');
Route::get('/keuangan/analisaaset/analisa3', 'KeuanganController@analisa3')->middleware('auth');
Route::get('/keuangan/analisacashflow/analisa4', 'KeuanganController@analisa4')->middleware('auth');
Route::get('/keuangan/analisaindex/analisa5', 'KeuanganController@analisa5')->middleware('auth');
Route::get('/keuangan/analisarasio/analisa6', 'KeuanganController@analisa6')->middleware('auth');
Route::get('/keuangan/analisabottom/analisa7', 'KeuanganController@analisa7')->middleware('auth');
Route::get('/keuangan/analisaroe/analisa8', 'KeuanganController@analisa8')->middleware('auth');


/*System*/
Route::get('/system/hakuser/user', 'SystemController@user')->middleware('auth');
Route::get('/system/hakakses/akses', 'SystemController@akses')->middleware('auth');
Route::get('/system/profilperusahaan/profil', 'SystemController@profil')->middleware('auth');
Route::get('/system/thnfinansial/finansial', 'SystemController@finansial')->middleware('auth');
Route::get('/system/hakuser/tambah_user', 'SystemController@tambah_user')->middleware('auth');
Route::get('/system/hakakses/tambah_akses', 'SystemController@tambah_akses')->middleware('auth');

// Nabila Moslem
Route::get('/nabila/membership/member', 'NabilaController@member')->middleware('auth');
Route::get('/nabila/belanjakaryawan/belanja', 'NabilaController@belanja')->middleware('auth');
Route::get('/nabila/voucherbelanja/voucher', 'NabilaController@voucher')->middleware('auth');
Route::get('/nabila/reseller/reseller', 'NabilaController@reseller')->middleware('auth');
Route::get('/nabila/marketer/marketer', 'NabilaController@marketer')->middleware('auth');
Route::get('/nabila/return/return', 'NabilaController@return')->middleware('auth');
Route::get('/nabila/purchasing/purchasing', 'NabilaController@purchasing')->middleware('auth');
});