<?php

namespace App\Modules\POS\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use DB;

use App\m_itemm;
use App\m_price;
use App\d_stock;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\POS\model\d_receivable;
use App\Modules\POS\model\d_receivable_dt;

use Datatables;

use Auth;






class PembayaranPiutangController extends Controller
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

    public function index() {
      return view('POS::pembayaranpiutang/index');
    }

    public function find_d_receivable() {
      $d_receivable = d_receivable::all();
      $data = array('data' => $d_receivable);

      return response()->json($data);
    }

    public function find_d_receivable_dt($r_id) {
      $d_receivable_dt = d_receivable_dt::where('rd_receivable', $r_id)->get();
      $data = array('data' => $d_receivable_dt);

      return response()->json($data);
    }

    public function insert_d_receivable_dt(Request $req) {

      DB::beginTransaction();
      try {
        $rd_receivable = $request->rd_receivable;
        $rd_receivable = $rd_receivable != null ? $rd_receivable : '';
        $rd_datepay = $request->rd_datepay;
        $rd_datepay = $rd_datepay != null ? $rd_datepay : '';
        $rd_value = $request->rd_value;
        $rd_value = $rd_value != null ? $rd_value : '';
        // Input ke tabel d_receivable_dt
        $d_receivable_dt = new d_receivable_dt;
        $d_receivable_dt->rd_receivable = $rd_receivable;
        $d_receivable_dt->rd_datepay = $rd_datepay;
        $d_receivable_dt->rd_value = $rd_value;
        $d_receivable_dt->save();
        // ==========================================

        // Update jumlah terbayar dan sisa pembayaran ke tabel d_receivable
        $d_receivable = d_receivable::where('r_id', $rd_receivable);
        $r_pay = $d_receivable_dt->where('rd_receivable', $rd_receivable)->sum('rd_value');
        $r_outstanding = $d_receivable->r_value - $r_pay;
        $d_receivable->r_pay = $r_pay;
        $d_receivable->r_outstanding = $r_outstanding;
        $d_receivable->save();
        // ==================================================================


        $res = array('status' => 'Error ' . $e);$res = array('status' => 'Error ' . $e);
        DB::commit();
      }
      catch(\Exception $e) {
        DB::rollback();
        
        return response()->json($res);
      }
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
    // =======================================================
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/