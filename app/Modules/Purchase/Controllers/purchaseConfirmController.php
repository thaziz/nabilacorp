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
use App\Modules\Purchase\model\d_purchase_plan;

use Datatables;






class purchaseConfirmController extends Controller
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
    
   
   public function seachItemPurchase(Request $request){
         return   m_item::seachItemPurchase($request);
   }
   public function storePlan(Request $request){
      d_purchase_plan::simpan($request);

   }
   public function confirmIndex(){         
     $tbh =view('Purchase::konfirmasipembelian/tab-belanjaharian');   
     $td =view('Purchase::konfirmasipembelian/tab-daftar');   
     $to =view('Purchase::konfirmasipembelian/tab-order');   
     $tr =view('Purchase::konfirmasipembelian/tab-return');   

     $mcb =view('Purchase::konfirmasipembelian/modal-confirm-belanjaharian');   
     $mco =view('Purchase::konfirmasipembelian/modal-confirm-order');   
     $mcr =view('Purchase::konfirmasipembelian/modal-confirm-return');   
     $mc =view('Purchase::konfirmasipembelian/modal-confirm');   
     
     return view('Purchase::konfirmasipembelian/index',compact('tbh','td','to','tr','mcb','mco','mcr','mc'));
   }
   public function getDataRencanaPembelian(Request $request){     
      return d_purchase_plan::getDataRencanaPembelian($request);
   }
   public function confirmRencanaPembelian($id,$type){
      return d_purchase_plan::confirmRencanaPembelian($id,$type);
   }

   public function konfirmasiPurchasePlan(Request $request){  
   /*dd($request->all());   */
      return d_purchase_plan::konfirmasiPurchasePlan($request);
   }
   

   


   
   public function formPlan()
    {        
         return view('Purchase::rencanapembelian/create');
    }

    public function rencana()
    {
        return view('/purchasing/rencanapembelian/rencana');
    }
    
    public function belanja()
    {
        return view('/purchasing/belanjaharian/belanja');
    }

    public function tambah_belanja()
    {
        return view('/purchasing/belanjaharian/tambah_belanja');
    }

    public function pembelian()
    {
        return view('/purchasing/returnpembelian/pembelian');
    }

    public function suplier()
    {
        return view('/purchasing/belanjasuplier/suplier');
    }

    public function langsung()
    {
        return view('/purchasing/belanjalangsung/langsung');
    }

    public function produk()
    {
        return view('/purchasing/belanjaproduk/produk');
    }
    public function pasar()
    {
        return view('/purchasing/belanjapasar/pasar');
    }
    public function create()
    {
        return view('Purchase::rencanapembelian/create');
    }
    public function tambah_pembelian()
    {
        return view('/purchasing/returnpembelian/tambah_pembelian');
    }
    public function tambah_order()
    {
        
    }
    public function bahan()
    {
        return view('/purchasing/rencanabahanbaku/bahan');
    }
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/