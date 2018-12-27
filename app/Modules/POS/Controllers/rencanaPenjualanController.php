<?php

namespace App\Modules\POS\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use DB;

use App\m_item;
use App\d_stock;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\POS\model\m_paymentmethod;
use App\Modules\POS\model\m_machine;
use App\Modules\POS\model\d_sales_plan;
use App\Modules\POS\model\d_salesplan_dt;


use Datatables;
use Session;
use Auth;






class rencanaPenjualanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     
    
    
    public function index() { 
        $printPl=view('Produksi::sam');
        $flag='Toko';
        $paymentmethod=m_paymentmethod::pm();       
        $pm =view('POS::paymentmethod/paymentmethod',compact('paymentmethod'));    
        $machine=m_machine::showMachineActive();      
        $data['toko']=view('POS::rencanapenjualan/toko',compact('machine'));      
        $data['listtoko']=view('POS::rencanapenjualan/listtoko');   
        return view('POS::rencanapenjualan/POSpenjualanToko',compact('data','pm','printPl'));
    }

    function simpan(Request $request){
      return d_sales_plan::simpan($request);
    }

    // Menampilkan form untuk mengupdate data
    function form_perbarui($sp_id) {
      $d_sales_plan = d_sales_plan::where('sp_id', $sp_id)->first();
      $d_salesplan_dt = d_salesplan_dt::where('spdt_salesplan', $sp_id)->get();
      
      $grand_total = 0;
      foreach($d_salesplan_dt as $item) {
        $item['m_item'] = $item->m_item;
        $item['satuan'] = '';
        $item['subtotal'] = '';
        if($item->m_item->m_satuan != null) {
          $item['satuan'] = $item->m_item->m_satuan->s_detname;
          $item['subtotal'] = $item->spdt_qty * $item->m_item->i_price; 
          $grand_total += $item['subtotal'];
        }
      }

      $d_sales_plan['d_salesplan_dt'] = $d_salesplan_dt;
      $data = array('d_sales_plan' => $d_sales_plan, 'grand_total' => $grand_total, 'sp_id' => $sp_id);
      return view('POS::rencanapenjualan/updateRencanaPenjualan', $data);
    }

    // Mengupdate data ke database
    function perbarui(Request $request){
      
      return d_sales_plan::perbarui($request);
    }

    public function hapus($id = '') {
        $transaction = DB::transaction(function() use ($id){
          $status = "gagal";
          if($id != '' ){
            $d_sales_plan = d_sales_plan::find($id);
            $d_sales_plan->delete();
            $d_salesplan_dt = d_salesplan_dt::where('spdt_salesplan', $id);
            $d_salesplan_dt->delete(); 
            $status = "sukses";
          }   

          $res = array( 'status' => $status );
          return response()->json($res);

        });

        return $transaction;
        
      }

    function find_d_sales_plan(Request $req) {
       $data = array();
       $sp_comp = Session::get('user_comp');
       $rows = d_sales_plan::leftJoin('d_salesplan_dt', 'spdt_salesplan', '=', 'sp_id')
          ->leftJoin('m_item', 'i_id', '=', 'spdt_item');
      // memilih kolom yang akan ditampilkan
      $rows = $rows->select('sp_id', 'sp_code', 'sp_comp', 'sp_mem', 'sp_date', DB::raw('IFNULL( SUM(i_price) , 0) AS total_harga'));    

        // Memfilter data
       $rows = $rows->where('sp_comp', $sp_comp);
       // Filter berdasarkan tanggal
       $tgl_awal = $req->tgl_awal;
       $tgl_awal = $tgl_awal != null ? $tgl_awal : '';
       $tgl_akhir = $req->tgl_akhir;
       $tgl_akhir = $tgl_akhir != null ? $tgl_akhir : '';
       if($tgl_awal != '' && $tgl_akhir != '') {
        $tgl_awal = date('Y-m-d', strtotime($tgl_awal));
        $tgl_akhir = date('Y-m-d', strtotime($tgl_akhir));
        $rows = $rows->whereBetween('sp_date', array($tgl_awal, $tgl_akhir));
       }

       $rows = $rows->groupBy('sp_id')->get();


       $res = array('data' => $rows);
       return response()->json($res);
    }

    
   
}