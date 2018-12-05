<?php

namespace App\Modules\Inventory\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\mMember;
use DB;
use Carbon\Carbon;
use DateTime;
use Yajra\Datatables\Datatables;
use Session;
use Response;

class PenerimaanBrgSupController extends Controller
{
    public function index(){
    	$tabIndex = view('Inventory::p_suplier.tab-index');
    	$tabWait = view('Inventory::p_suplier.tab-wait');
    	$tabFinish = view('Inventory::p_suplier.tab-finish');
    	$tabModal = view('Inventory::p_suplier.modal');
    	$tabModDetail = view('Inventory::p_suplier.modal-detail');
    	$tabDetItem = view('Inventory::p_suplier.modal-detail-peritem');
    	return view('Inventory::p_suplier.index',compact('tabIndex','tabWait','tabFinish','tabModal','tabModDetail','tabDetItem'));
    }

 	public function lookupDataPembelian(Request $request)
    {
        $formatted_tags = array();
        $term = trim($request->q);
        if (empty($term)) 
        {
            $purchase = DB::table('d_purchasing_dt')->join('d_purchasing', 'd_purchasing_dt.d_pcs_id', '=', 'd_purchasing.d_pcs_id')->select('d_purchasing_dt.d_pcs_id', 'd_purchasing.d_pcs_code')->where('d_pcsdt_isreceived','=','FALSE')->where('d_purchasing_dt.d_pcsdt_isconfirm','=','TRUE')->orderBy('d_pcs_code', 'DESC')->limit(5)->groupBy('d_pcs_id')->get();
            foreach ($purchase as $val) 
            {
                $formatted_tags[] = ['id' => $val->d_pcs_id, 'text' => $val->d_pcs_code];
            }
            return Response::json($formatted_tags);
        }
        else
        {
            $purchase = DB::table('d_purchasing_dt')->join('d_purchasing', 'd_purchasing_dt.d_pcs_id', '=', 'd_purchasing.d_pcs_id')->select('d_purchasing_dt.d_pcs_id', 'd_purchasing.d_pcs_code')->where('d_purchasing_dt.d_pcsdt_isreceived','=','FALSE')->where('d_purchasing.d_pcs_code', 'LIKE', '%'.$term.'%')->where('d_purchasing_dt.d_pcsdt_isconfirm','=','TRUE')->orderBy('d_purchasing.d_pcs_code', 'DESC')->limit(5)->groupBy('d_pcs_id')->get();

            foreach ($purchase as $val) 
            {
                $formatted_tags[] = ['id' => $val->d_pcs_id, 'text' => $val->d_pcs_code];
            }

          return Response::json($formatted_tags);  
        }
    }
}
