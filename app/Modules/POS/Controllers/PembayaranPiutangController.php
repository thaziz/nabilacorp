<?php

namespace App\Modules\POS\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use App\m_itemm;
use App\m_price;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\POS\model\d_receivable;
use App\Modules\POS\model\d_receivable_dt;
use DB;

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

    public function find_d_receivable(Request $req) {
      $tgl_awal = $req->tgl_awal;
      $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
      $tgl_akhir = $req->tgl_akhir;
      $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
      if($tgl_awal != '' && $tgl_akhir != '') {
        $tgl_awal = date('Y-d-m', strtotime($tgl_awal));
        $tgl_akhir = date('Y-d-m', strtotime($tgl_akhir));
        $d_receivable = d_receivable::whereBetween('r_date', array($tgl_awal, $tgl_akhir))->get();
      }
      else {

        $d_receivable = d_receivable::all();
      }
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

        $rd_receivable = $req->rd_receivable;
        $rd_receivable = $rd_receivable != null ? $rd_receivable : '';
        $rd_datepay = $req->rd_datepay;
        $rd_datepay = $rd_datepay != null ? $rd_datepay : '';
        $rd_datepay = date('Y-d-m', strtotime($rd_datepay));

        $rd_value = $req->rd_value;
        $rd_value = $rd_value != null ? $rd_value : '';

        $rd_detailid = DB::table('d_receivable_dt')->where('rd_receivable', $rd_receivable)->select( DB::raw('IFNULL(COUNT(rd_detailid), 0) AS count_detailid') )->get()->first();
        $rd_detailid = $rd_detailid->count_detailid + 1;
        // Input ke tabel d_receivable_dt
        $d_receivable_dt = new d_receivable_dt;
        $d_receivable_dt->rd_receivable = $rd_receivable;
        $d_receivable_dt->rd_detailid = $rd_detailid;
        $d_receivable_dt->rd_datepay = $rd_datepay;
        $d_receivable_dt->rd_value = $rd_value;
        $d_receivable_dt->save();
        // ==========================================

        // Update jumlah terbayar dan sisa pembayaran ke tabel d_receivable
        $d_receivable = d_receivable::find($rd_receivable);
        $d_receivable_data = $d_receivable->first();
        $r_pay = $d_receivable_dt->where('rd_receivable', $rd_receivable)->sum('rd_value');
        $r_outstanding = d_receivable::where('r_id', $rd_receivable)->get()->first()->r_value - $r_pay;
        $d_receivable->r_pay = $r_pay;
        $d_receivable->r_outstanding = $r_outstanding;
        $d_receivable->save();
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
}