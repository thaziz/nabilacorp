<?php

namespace App\Modules\Purchase\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use DB;
use Datatables;
use Auth;

use App\m_divisi;
use App\m_itemm;
use App\Modules\Purchase\model\d_purchasingharian;
use App\Modules\Purchase\model\d_purchasingharian_dt;

use Session;

class BelanjaHarianController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

     
    
    
    public function index() { 
           
        return view('Purchase::belanjaharian/belanja');
    }

    public function tambah_belanja() { 
        $m_divisi = m_divisi::all();
        $data = array('m_divisi' => $m_divisi);

        return view('Purchase::belanjaharian/tambah_belanja', $data);
    }

    public function hapus($id) { 
      // Menghapus purchasing harian 

      DB::beginTransaction();
      try {
        
        $d_purchasingharian = d_purchasingharian::where('d_pcsh_id', $id);
        $d_purchasingharian->delete();

        $d_purchasingharian_dt = d_purchasingharian_dt::where('d_pcshdt_pcshid', $id);
        $d_purchasingharian_dt->delete();

        DB::commit();
        $status = 'sukses';
      }
      catch(\Exception $e) {
        DB::rollback();
        $status = 'gagal. ' . $e;
      }
      $res = array( 'status' => $status);

      return response()->json($res);
    }

    function insert_d_purchasingharian(Request $request){
      $d_pcsh_date = $request->d_pcsh_date;
      $d_pcsh_date = $d_pcsh_date != null ? $d_pcsh_date : '';
      $d_pcsh_date = date('Y-d-m', strtotime($d_pcsh_date));

      $d_pcsh_staff = $request->d_pcsh_staff;
      $d_pcsh_staff = $d_pcsh_staff != null ? $d_pcsh_staff : '';
      $d_pcsh_divisi = $request->d_pcsh_divisi;
      $d_pcsh_divisi = $d_pcsh_divisi != null ? $d_pcsh_divisi : '';
      $d_pcsh_keperluan = $request->d_pcsh_keperluan;
      $d_pcsh_keperluan = $d_pcsh_keperluan != null ? $d_pcsh_keperluan : '';
      
      DB::beginTransaction();
      try {
        $d_purchasingharian = new d_purchasingharian();

        $d_pcsh_id = DB::table('d_purchasingharian')->select(DB::raw('IFNULL(MAX(d_pcsh_id), 0) + 1 AS new_id'))->get()->first()->new_id;
        $grand_total = 0;
        
        $d_purchasingharian_dt = new d_purchasingharian_dt();

        $d_pcshdt_item = $request->d_pcshdt_item;
        $d_pcshdt_item = $d_pcshdt_item != null ? $d_pcshdt_item : array();
        if( count($d_pcshdt_item) > 0 ) {
            $d_pcshdt_qty = $request->d_pcshdt_qty;
            $d_pcshdt_qty = $d_pcshdt_qty != null ? $d_pcshdt_qty : array();
            $d_pcshdt_qty = $request->d_pcshdt_qty;
            $d_pcshdt_qty = $d_pcshdt_qty != null ? $d_pcshdt_qty : array();
            $d_pcshdt_price = $request->d_pcshdt_price;
            $d_pcshdt_price = $d_pcshdt_price != null ? $d_pcshdt_price : array();

            for($x = 0; $x < count($d_pcshdt_item);$x++) {
                $d_purchasingharian_dt->d_pcshdt_pcshid = $d_pcsh_id;
                $d_purchasingharian_dt->d_pcshdt_item = $d_pcshdt_item[$x];
                $d_purchasingharian_dt->d_pcshdt_qty = $d_pcshdt_qty[$x];
                $d_purchasingharian_dt->d_pcshdt_price = $d_pcshdt_price[$x];
                
                $pricetotal = $d_pcshdt_qty[$x] * $d_pcshdt_price[$x];
                $grand_total += $pricetotal;
                $d_purchasingharian_dt->d_pcshdt_pricetotal = $pricetotal;
                $d_purchasingharian_dt->save();
            }
        }

        $d_purchasingharian->d_pcsh_code = 'BELANJAHARIAN/' . $d_pcsh_date;
        $d_purchasingharian->d_pcsh_id = $d_pcsh_id;
        $d_purchasingharian->d_pcsh_date = $d_pcsh_date;
        $d_purchasingharian->d_pcsh_staff = $d_pcsh_staff;
        $d_purchasingharian->d_pcsh_divisi = $d_pcsh_divisi;
        $d_purchasingharian->d_pcsh_keperluan = $d_pcsh_keperluan;
        $d_purchasingharian->d_pcsh_status = 'DE';
        $d_purchasingharian->d_pcsh_totalpaid = 0;
        $d_purchasingharian->d_pcsh_totalprice = $grand_total;

        $d_purchasingharian->save();


        DB::commit();
        $status = 'sukses';
      }
      catch(\Exception $e) {
        DB::rollback();
        $status = 'gagal. ' . $e;
      }
      $res = array( 'status' => $status);

      return response()->json($res);
    }
    function update_d_purchasingharian(Request $request){
      $d_pcsh_id = $request->d_pcsh_id;
      $d_pcsh_id = $d_pcsh_id != null ? $d_pcsh_id : '';
      $d_pcsh_date = $request->d_pcsh_date;
      $d_pcsh_date = $d_pcsh_date != null ? $d_pcsh_date : '';
      $d_pcsh_staff = $request->d_pcsh_staff;
      $d_pcsh_staff = $d_pcsh_staff != null ? $d_pcsh_staff : '';
      $d_pcsh_divisi = $request->d_pcsh_divisi;
      $d_pcsh_divisi = $d_pcsh_divisi != null ? $d_pcsh_divisi : '';
      $d_pcsh_keperluan = $request->d_pcsh_keperluan;
      $d_pcsh_keperluan = $d_pcsh_keperluan != null ? $d_pcsh_keperluan : '';
      
      DB::beginTransaction();
      try {
        $d_purchasingharian = new d_purchasingharian();

        $d_pcsh_id = DB::table('d_purchasingharian')->select(DB::raw('MAX(d_pcsh_id) + 1 AS new_id'))->get()->first()->new_id;

        $d_purchasingharian->d_pcsh_date = $d_pcsh_date;
        $d_purchasingharian->d_pcsh_staff = $d_pcsh_staff;
        $d_purchasingharian->d_pcsh_divisi = $d_pcsh_divisi;
        $d_purchasingharian->d_pcsh_keperluan = $d_pcsh_keperluan;
        $d_purchasingharian->d_pcsh_status = 'DE';
        $d_purchasingharian->d_pcsh_totalpaid = 0;

        $d_purchasingharian->save();

        $d_purchasingharian_dt = new d_purchasingharian_dt();

        $d_pcshdt_item = $request->d_pcshdt_item;
        $d_pcshdt_item = $d_pcshdt_item != null ? $d_pcshdt_item : array();
        if( count($d_pcshdt_item) > 0 ) {
            $d_purchasingharian_dt->where('d_pcshdt_pcshid', $d_pcsh_id)->delete();

            $d_pcshdt_qty = $request->d_pcshdt_qty;
            $d_pcshdt_qty = $d_pcshdt_qty != null ? $d_pcshdt_qty : array();
            $d_pcshdt_qty = $request->d_pcshdt_qty;
            $d_pcshdt_qty = $d_pcshdt_qty != null ? $d_pcshdt_qty : array();
            $d_pcshdt_price = $request->d_pcshdt_price;
            $d_pcshdt_price = $d_pcshdt_price != null ? $d_pcshdt_price : array();

            for($x = 0; $x < count($d_pcshdt_item);$x++) {
                $d_purchasingharian_dt->d_pcshdt_pcshid = $d_pcshdt_pcshid;
                $d_purchasingharian_dt->d_pcshdt_item = $d_pcshdt_item[$x];
                $d_purchasingharian_dt->d_pcshdt_qty = $d_pcshdt_qty[$x];
                $d_purchasingharian_dt->d_pcshdt_price = $d_pcshdt_price[$x];
                
                $pricetotal = $d_pcshdt_qty[$x] * $d_pcshdt_price[$x];
                $d_purchasingharian_dt->d_pcshdt_pricetotal = $pricetotal;
                $d_purchasingharian_dt->save();
            }
        }

        DB::commit();
      }
      catch(\Exception $e) {
        DB::rollback();
      }

      return d_sales_plan::simpan($request);
    }

    // Menampilkan form untuk mengupdate data
    function form_perbarui($d_pcsh_id) {
      // Daftar divisi
      $m_divisi = m_divisi::all();
        $data = array('m_divisi' => $m_divisi);

      // Membuat form update belanja harian
      $d_purchasingharian = d_purchasingharian::leftJoin('d_mem', 'd_pcsh_staff', '=', 'm_id');
      $d_purchasingharian = $d_purchasingharian->leftJoin('m_divisi', 'd_pcsh_divisi', '=', 'd_id');

      $d_purchasingharian = $d_purchasingharian->where('d_pcsh_id', $d_pcsh_id)->get()->first();

      $d_purchasingharian_dt = d_purchasingharian_dt::where('d_pcshdt_pcshid', $d_pcsh_id)->get();

      $res = array(
          "d_purchasingharian" => $d_purchasingharian,
          "d_purchasingharian_dt" => $d_purchasingharian_dt,
          "m_divisi" => $m_divisi
      );

      return view('Purchase::belanjaharian/edit_belanja', $res);

    }

   

    function find_d_purchasingharian(Request $req) {

       $data = array();
       $rows = d_purchasingharian::leftJoin('d_mem', 'd_pcsh_staff', '=', 'm_id');
       $rows = $rows->leftJoin('m_divisi', 'd_pcsh_divisi', '=', 'd_id');

       // Filter berdasarkan tanggal
       $tgl_awal = $req->tgl_awal;
       $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
       $tgl_akhir = $req->tgl_akhir;
       $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
       if($tgl_awal != '' && $tgl_akhir != '') {
        $tgl_awal = date('Y-d-m', strtotime($tgl_awal));
        $tgl_akhir = date('Y-d-m', strtotime($tgl_akhir));
        $rows = $rows->whereBetween('d_pcsh_date', array($tgl_awal, $tgl_akhir));
       }

       $rows = $rows->get();
       

       $res = array('data' => $rows);
       return response()->json($res);
    }

    function find_m_item(Request $req) {
      $m_item = m_itemm::leftJoin('m_satuan', 'i_sat1', '=', 's_id');
      $m_item = $m_item->leftJoin('m_price', 'i_id', '=', 'm_pitem');

      // Mencari data keyword
      $keyword = $req->keyword;
      $keyword = $keyword != null ? $keyword : '';
      if($keyword != '') {
        $m_item = $m_item->where('i_code', 'LIKE', '%' . $keyword . '%')->orWhere('i_name', 'LIKE', '%' . $keyword . '%');
          
      }

      $m_item = $m_item->take(10)->get();
      $data = array('data' => $m_item);

      return response()->json($data);
    }

}
