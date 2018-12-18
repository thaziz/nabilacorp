<?php

namespace App\Modules\Purchase\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\m_itemm;
use App\m_price;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\Purchase\model\d_payable;
use App\Modules\Purchase\model\d_payable_dt;
use DB;

use Auth;
use Carbon\carbon;





class PembayaranHutangController extends Controller
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
      return view('Purchase::pembayaranhutang/index');
    }

    public function find_d_payable(Request $req) {
      $tgl_awal = $req->tgl_awal;
      $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
      $tgl_akhir = $req->tgl_akhir;
      $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
      if($tgl_awal != '' && $tgl_akhir != '') {
        $tgl_awal = date('Y-d-m', strtotime($tgl_awal));
        $tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));
        die($tgl_akhir);

        $d_payable = d_payable::whereBetween('p_date', array($tgl_awal, $tgl_akhir))->get();
      }
      else {

        $d_payable = d_payable::all();
      }
      $data = array('data' => $d_payable);

      return response()->json($data);
    }

    public function find_d_payable_dt($r_id) {
      $d_payable_dt = d_payable_dt::where('rd_payable', $r_id)->get();
      $data = array('data' => $d_payable_dt);

      return response()->json($data);
    }

    public function insert_d_payable_dt(Request $req) {

      DB::beginTransaction();
      try {

        $rd_payable = $req->rd_payable;
        $rd_payable = $rd_payable != null ? $rd_payable : '';
        $rd_datepay = $req->rd_datepay;
        $rd_datepay = $rd_datepay != null ? $rd_datepay : '';
        $rd_datepay = date('Y-d-m', strtotime($rd_datepay));

        $rd_value = $req->rd_value;
        $rd_value = $rd_value != null ? $rd_value : '';

        $rd_detailid = DB::table('d_payable_dt')->where('rd_payable', $rd_payable)->select( DB::raw('IFNULL(COUNT(rd_detailid), 0) AS count_detailid') )->get()->first();
        $rd_detailid = $rd_detailid->count_detailid + 1;
        // Input ke tabel d_payable_dt
        $d_payable_dt = new d_payable_dt;
        $d_payable_dt->rd_payable = $rd_payable;
        $d_payable_dt->rd_detailid = $rd_detailid;
        $d_payable_dt->rd_datepay = $rd_datepay;
        $d_payable_dt->rd_value = $rd_value;
        $d_payable_dt->save();
        // ==========================================

        // Update jumlah terbayar dan sisa pembayaran ke tabel d_payable
        $d_payable = d_payable::find($rd_payable);
        $d_payable_data = $d_payable->first();
        $r_pay = $d_payable_dt->where('rd_payable', $rd_payable)->sum('rd_value');
        $r_outstanding = d_payable::where('r_id', $rd_payable)->get()->first()->r_value - $r_pay;
        $d_payable->r_pay = $r_pay;
        $d_payable->r_outstanding = $r_outstanding;
        $d_payable->save();
        // ==================================================================


        DB::commit();
        $res = array('status' => 'sukses' );
      }
      catch(\Exception $e) {
        DB::rollback();
        
        $res = array('status' => 'Error. ' . $e);
      }
      return response()->json($res);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    
   /* public function cut(){
      $connector = new FilePrintConnector("\\\TAZIZ-PC\Purchase-80");
      $printer = new Printer($connector);
      $printer -> cut();
      $printer -> close();

    }*/
    // =======================================================
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/