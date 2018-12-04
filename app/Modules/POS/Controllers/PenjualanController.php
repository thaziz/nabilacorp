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
use App\Modules\POS\model\d_sales;
use App\Modules\POS\model\d_sales_dt;

use Datatables;

use Auth;






class PenjualanController extends Controller
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
    
    public function indexStok(){
        return view('POS::penjualanStock/index',compact('d'));
    }
    public function dataStok(){
      $stok=d_stock::dataStok();
      return $stok;      
    }
    public function s(){
      $d='data';
      return view('POS::POSpenjualanToko/s',compact('d'));
    }
    public function POSpenjualan()
    {
      
      $pilihan=view('POS::POSpenjualan.pilihan');
      return view('POS::POSpenjualan/POSpenjualan',compact('pilihan'));
    }
    //auto complete barang
    public function item(Request $item)
    { 
      return m_itemm::seachItem($item);
    }
    public function searchItemCode(Request $item)
    { 
      
      return m_itemm::searchItemCode($item);
    }
    
    //auto complete customer
    public function customer(Request $customer){
      return m_customer::customer($customer);     
    }

    function paymentmethod (Request $request){
      $jumlah=$request->dataIndex;
      $paymentmethod=m_paymentmethod::pm();       
      $data =view('POS::paymentmethod/paymentmethod',compact('paymentmethod','jumlah'));    
      $a='';
      $a.=$data;
      $x=['view'=>$a,'jumlah'=>$jumlah];
      return $x;
    }
    function paymentmethodEdit($id,$flag){
      $data=m_paymentmethod::paymentmethodEdit($id,$flag);              
      $jumlah=count($data['sales_pm']);
       $data =view('POS::paymentmethod/paymentmethodEdit',compact('data','jumlah'));    
       $a='';
      $a.=$data;
      $x=['view'=>$a,'jumlah'=>$jumlah];
      return $x;

    }
    
    public function posToko()
    { 
      $printPl=view('Produksi::sam');
      $flag='Toko';
      $paymentmethod=m_paymentmethod::pm();       
      $pm =view('POS::paymentmethod/paymentmethod',compact('paymentmethod'));    
      $machine=m_machine::showMachineActive();      
      $data['toko']=view('POS::POSpenjualanToko/toko',compact('machine'));      
      $data['listtoko']=view('POS::POSpenjualanToko/listtoko');   
      return view('POS::POSpenjualanToko/POSpenjualanToko',compact('data','pm','printPl'));
    }

    function create(Request $request){
      return d_sales::simpan($request);
    }

     function update(Request $request){
      
      return d_sales::perbarui($request);
    }

    function penjualanDtToko($id,Request $request){      
      $status=$request->s_status;
      $data=d_sales_dt::penjualanDt($id);
      $tamp=[];
      foreach ($data as $key => $value) {
          $tamp[$key]=$value->i_id;
      }      
      $tamp=array_map("strval",$tamp);      
      return view('POS::POSpenjualanToko/editDetailPenjualan',compact('data','tamp','status'));
      
    }

    


    function penjualanViewDtToko($id){            
      $data=d_sales_dt::penjualanDt($id);
      $tamp=[];
      foreach ($data as $key => $value) {
          $tamp[$key]=$value->i_id;
      }      
      $tamp=array_map("strval",$tamp);      
      return view('POS::POSpenjualanToko/viewDetailPenjualan',compact('data','tamp'));
      
    }


    function listPenjualan(Request $request){
      if($request->ajax()){
        return view('POS::POSpenjualanToko/tableListToko');
      }else{
        return 'f';
      }
        
    }
    function listPenjualanData(Request $request){
      /*if($request->ajax()){*/
        return d_sales::listPenjualanData($request);
      /*}else{
        return 'f';
      }*/
      
    }
  function printNota($id, Request $request){
      $jumlah=count(($request->sd_item));      
      $bayar=$request->s_bayar;
      $kembalian=$request->kembalian;
      $data=d_sales::printNota($id);
      
      return view('POS::POSpenjualanToko/printNota',compact('data','kembalian','bayar','jumlah'));
   
  }
   public function POSpenjualanPesanan()
    {
      return view('/penjualan/POSpenjualanPesanan/POSpenjualanPesanan');
    }
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/