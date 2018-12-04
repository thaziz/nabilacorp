<?php

namespace App\Modules\Purchase\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use DB;

use App\m_itemm;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\Purchase\model\d_purchase_order;

use App\m_supplier;

use Datatables;






class purchaseOrderController extends Controller
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
         return   m_itemm::seachItemPurchase($request);
   }
   public function simpanOrder(Request $request){
      d_purchase_order::simpanOrder($request);

   }
   public function orderIndex(){     
    $tindex =view('Purchase::orderpembelian/tab-index');       
    $history =view('Purchase::orderpembelian/tab-history');   
    /*$to =view('Purchase::orderpembelian/tambah_order');   */

    $modal =view('Purchase::orderpembelian/modal'); 
    $modaledit =view('Purchase::orderpembelian/modal-edit');       

    $modaldetail=view('Purchase::orderpembelian/modal-detail-peritem'); 
     
     return view('Purchase::orderpembelian/index',compact('tindex','history','to','modal','modaledit','modaldetail'));
   }
   public function dataOrder(Request $request){     
      return d_purchase_order::dataOrder($request);
   }
   public function formOrder()
    {        
         return view('Purchase::orderpembelian/tambah_order');
    }
     public function getDataForm($id)
    {        
         return d_purchase_order::getDataForm($id);
    }    
    public function getDataCodePlan(Request $request)
    {        
         return d_purchase_order::getDataCodePlan($request);
    }    

     public function seachSupplier(Request $request) {
        return m_supplier::seachSupplier($request);

     }
   
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/