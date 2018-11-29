<?php

namespace App\Modules\POS\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use DB;

use App\m_itemm;
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
      $d_sales_plan = d_sales_plan::findOrFail($sp_id)->first();
      $d_salesplan_dt = d_salesplan_dt::where('spdt_salesplan', $sp_id)->get();
      
      foreach($d_salesplan_dt as $item) {
        $item['m_item'] = $item->m_item;
        $item['satuan'] = '';
        if($item->m_item->m_satuan != null) {
          $item['satuan'] = item->m_item->s_detname;
        }
      }

      $d_sales_plan['d_salesplan_dt'] = $d_salesplan_dt;
      $data = array('d_sales_plan' => $d_sales_plan);
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
       $rows = d_sales_plan::where('sp_comp', $sp_comp);

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

       $rows = $rows->get();
       foreach ($rows as $row) {
         $new_row = $row;
         $new_row['i_price'] = 0;
         $new_row['total_harga'] = 0;
         if($row->d_salesplan_dt != null) {
            $qty = $row->d_salesplan_dt->sum('spdt_qty');
            if($row->d_salesplan_dt->m_item != null) {
                $new_row['total_harga'] = $qty * $row->d_salesplan_dt->m_item->sum('i_price');
            }
         }
         array_push($data, $new_row);
       }

       $res = array('data' => $data);
       return response()->json($res);
    }

    
   
}