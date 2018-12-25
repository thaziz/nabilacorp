<?php

namespace App\Modules\Purchase\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use DB;

use App\m_item;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\POS\model\m_paymentmethod;
use App\Modules\POS\model\m_machine;
use App\Modules\Purchase\model\d_purchase_return;
use App\Modules\Purchase\model\d_purchasereturn_dt;

use Datatables;

use Auth;




class PurchaseReturnController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
   /* public function cut(){
      $connector = new FilePrintConnector("\\\TAZIZ-PC\POS-80");
      $printer = new Printer($connector);
      $printer -> cut();
      $printer -> close();

    }*/

    public function pembelian()
    {
        return view('Purchase::returnpembelian/pembelian');
    }

    public function tambah_pembelian()
    {
        
        $staff['nama'] = Auth::user()->m_name;
        $staff['id'] = Auth::User()->m_id;
        $resp = array(
          
          'staff' => $staff
        );
        return view('Purchase::returnpembelian/tambah_pembelian', $resp);
    }
    
    public function find_d_purchase_return(Request $req) {
      $d_purchase_return = d_purchase_return::leftJoin('d_mem', 'pr_staff', '=', 'm_id')
        ->leftJoin('m_supplier', 'pr_supplier', '=', 's_id');
      // Filter berdasarkan tanggal
       $tgl_awal = $req->tgl_awal;
       $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
       $tgl_akhir = $req->tgl_akhir;
       $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
       if($tgl_awal != '' && $tgl_akhir != '') {
          $tgl_awal = preg_replace('/([0-9]+)([\/-])([0-9]+)([\/-])([0-9]+)/', '$5-$3-$1', $tgl_awal);
          $tgl_akhir = preg_replace('/([0-9]+)([\/-])([0-9]+)([\/-])([0-9]+)/', '$5-$3-$1', $tgl_akhir);
          $d_purchase_return = $d_purchase_return->whereBetween('pr_datecreated', array($tgl_awal, $tgl_akhir));
       }  

      $d_purchase_return = $d_purchase_return->get();
      $res = array(
        'data' => $d_purchase_return
      );

      return response()->json($res);
    }

    function insert_d_purchase_return(Request $req) {
      $d_purchase_return = new d_purchase_return(); 
      $d_purchasereturn_dt = new d_purchasereturn_dt(); 
      $new_id = $d_purchase_return->select( DB::raw('IFNULL(MAX(pr_id), 0) + 1 AS new_id') )->get()->first();

      $pr_id = $new_id->new_id;
      $pr_purchase = $req->pr_purchase;
      $pr_purchase = $pr_purchase != null ? $pr_purchase : '';
      $pr_supplier = $req->pr_supplier;
      $pr_supplier = $pr_supplier != null ? $pr_supplier : '';
      $pr_method = $req->pr_method;
      $pr_method = $pr_method != null ? $pr_method : '';
      $pr_staff = $req->pr_staff;
      $pr_staff = $pr_staff != null ? $pr_staff : '';
      $pr_datecreated = $req->pr_datecreated;
      $pr_datecreated = $pr_datecreated != null ? $pr_datecreated : '';

      DB::beginTransaction();
      try {
        $d_purchase_return->pr_purchase = $pr_purchase;
        $d_purchase_return->pr_supplier = $pr_supplier;
        $d_purchase_return->pr_method = $pr_method;
        $d_purchase_return->pr_staff = $pr_staff;
        $d_purchase_return->pr_datecreated = $pr_datecreated;

        $d_purchase_return->save();

        $prdt_item = $req->prdt_item;
        $prdt_item = $prdt_item != null ? $prdt_item : array();
        if( count($prdt_item) > 0 ) {
          $prdt_qty = $req->prdt_qty;

          $prdt_qty = $prdt_qty != null ? $prdt_qty : array();
           $prdt_qtyreturn = $req->prdt_qtyreturn;

          $prdt_qtyreturn = $prdt_qtyreturn != null ? $prdt_qtyreturn : array();
           $prdt_price = $req->prdt_price;

          $prdt_price = $prdt_price != null ? $prdt_price : array();
           

          for($x = 0;$x < count($prdt_item);$x++) {
              $d_purchasereturn_dt->prdt_item = $prdt_item[$x];
              $d_purchasereturn_dt->prdt_qty = $prdt_qty[$x];
              $d_purchasereturn_dt->prdt_qtyreturn = $prdt_qtyreturn[$x];
              $d_purchasereturn_dt->prdt_price = $prdt_price[$x];
              $d_purchasereturn_dt->save();
          }
        }

        DB::commit();
        $res = array('status' => 'sukses' );
      }
      catch(\Exception $e) {
        DB::rollback();
        
        $res = array('status' => 'Error. ' . $e);
      }

    }

    function delete_d_purchase_return($pr_id) {
      
      DB::beginTransaction();
      try {
        $d_purchase_return = d_purchase_return::where('pr_id', $pr_id);
        $d_purchase_return->delete();
        $d_purchasereturn_dt = d_purchasereturn_dt::where('prdt_purchasereturn', $pr_id);

        DB::commit();
        $res = array('status' => 'sukses' );
      }
      catch(\Exception $e) {
        DB::rollback();
        
        $res = array('status' => 'Error. ' . $e);
      }

    }
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/