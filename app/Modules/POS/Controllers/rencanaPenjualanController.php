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

    function find_d_sales_plan() {
       $data = array();
       $rows = d_sales_plan::all();


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