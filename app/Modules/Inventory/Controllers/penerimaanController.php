<?php
namespace App\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\mMember;
use DB;
use Carbon\Carbon;
use DateTime;
use Yajra\Datatables\Datatables;
use Session;
use App\Lib\mutasi;
use App\Modules\Purchase\model\d_purchase_order;
use App\Modules\Purchase\model\d_purchaseorder_dt;
class penerimaanController extends Controller {
	public function __construct(){
        $this->middleware('auth');
    }

	public function index()
	{
		$data = DB::table('d_purchase_order')
							->where('po_status', 'CF')
							->select('po_code', 'po_id')
							->get();

    	$modal =view('Inventory::penerimaan/modal');
		return view('Inventory::penerimaan.index', compact('data','modal','gudang'));
	}
	public function suplier_cari($id)
	{
		$dataHeader = d_purchase_order::join('m_supplier','po_supplier','=','s_id')
                            ->leftjoin('d_mem','po_mem','=','m_id')
                            ->select(
                                'po_id',
                                'po_code',
                                's_company',
                                'po_date', 
                                'po_status',
                                DB::raw('IFNULL(po_date_confirm, "") AS p_confirm'),
                                DB::raw('IFNULL(m_id, "") AS m_id'),
                                DB::raw('IFNULL(m_name, "") AS m_name'))
                            ->where('po_id', '=', $id)
                            ->orderBy('po_date', 'DESC')
                            ->get();

  		$dataIsi = d_purchaseorder_dt::join('m_item','podt_item','=','i_id')
                                ->leftjoin('m_satuan', 's_id', '=', 'i_satuan')
                                ->leftjoin('d_stock','s_item','=','i_id')
                                ->select('i_id',
                                         'i_satuan',
                                         'm_item.i_code',
                                         'm_item.i_name',
                                         's_name',                                         
                                         'podt_qty',
                                         'podt_qtyconfirm',
                                         DB::raw('IFNULL(s_qty, 0) AS s_qty'),
                                         'podt_prevcost',
                                         'podt_purchaseorder',
                                          'podt_detailid',
                                          'podt_price',
                                          'podt_total'
                                )
                                ->where('podt_purchaseorder', '=', $id)
                                // ->orderBy('podt_created', 'DESC')
                                ->get();
		$gudang = DB::table('d_gudangcabang')->get();	

        return response()->json([
        	'header' => $dataHeader,
        	'detail' => $dataIsi,
        	'gudang' => $gudang
        ]);

	}

	public function suplier_save(Request $request)
	{
		// dd($request->all());

		$save1 = DB::table('d_purchase_order')->where('po_code',$request->noNotaMasuk)->update([
			'po_status'=>'RC'
		]);



		for ($i=0; $i <count($request->confirmqty) ; $i++) { 
			$idplus1 = DB::table('d_stock')->max('s_id');
			if ($idplus1 == null) {
				$idplus1 = 1;
			}else{
				$idplus1 +=1;
			}

			$save = DB::table('d_stock')->insert([
				's_id'=>$idplus1,
				's_item'=>$request->item[$i],
				's_qty'=>$request->terima[$i],
				's_comp'=>$request->comp,
				's_position'=>$request->position,
				's_insert'=>date('Y-m-d')
			]);

			$save_mut = DB::table('d_stock_mutation')->insert([
				'sm_stock'=>$idplus1,
				'sm_detailid'=>$idplus1,
				'sm_item'=>$request->item[$i],
				'sm_qty'=>$request->terima[$i],
				'sm_qty_used'=>0,
				'sm_qty_sisa'=>$request->terima[$i],
				'sm_qty_expired'=>0,
				'sm_reff'=>$request->noNotaMasuk,
				'sm_comp'=>$request->comp,
				'sm_position'=>$request->position,
				'sm_date'=>date('Y-m-d'),
				'sm_insert'=>date('Y-m-d')
			]);
		}
	}

	public function getdata(Request $request){		
			$data = DB::table('d_pengiriman')
							->join('d_pengiriman_dt', 'pd_pengiriman', '=', 'p_id')
							->join('m_item', 'i_id', '=', 'pd_item')
							->where('p_id', $request->id)
							->get();

			for ($i=0; $i < count($data); $i++) {
				if ($data[$i]->pd_penerima == null) {
					$data[$i]->pd_penerima = '-';
				}
			}

			return response()->json($data);
	}
	public function suplier_datatable(Request $request)
  {
    $data = d_purchase_order::join('m_supplier','d_purchase_order.po_supplier','=','m_supplier.s_id')
            ->join('d_mem','d_purchase_order.po_mem','=','d_mem.m_id')
            ->where('po_status','RC')
            ->get();
    // return $data;    
    return DataTables::of($data)
    ->addIndexColumn()
    ->editColumn('status', function ($data)
      {
      if ($data->po_status == "WT") 
      {
        return '<span class="label label-info">Waiting</span>';
      }
      elseif ($data->po_status == "DE") 
      {
        return '<span class="label label-warning">Dapat diedit</span>';
      }
      elseif ($data->po_status == "RC") 
      {
        return '<span class="label label-success">Finish</span>';
      }
    })
    ->editColumn('tglBuat', function ($data) 
    {
        if ($data->po_date == null) 
        {
            return '-';
        }
        else 
        {
            return $data->po_date ? with(new Carbon($data->po_date))->format('d M Y') : '';
        }
    })
    ->editColumn('tglConfirm', function ($data) 
    {
        if ($data->p_confirm == null) 
        {
            return '-';
        }
        else 
        {
            return $data->p_confirm ? with(new Carbon($data->p_confirm))->format('d M Y') : '';
        }
    })
    ->addColumn('action', function($data)
      {
        // if ($data->p_status == "WT") 
        // {
        //     return '<div class="text-center">
        //               <button class="btn btn-sm btn-primary" title="Ubah Status"
        //                   onclick=konfirmasiPlanAll("'.$data->p_id.'")><i class="fa fa-check"></i>
        //               </button>
        //           </div>'; 
        // }
        // else 
        // {
        //     return '<div class="text-center">
        //               <button class="btn btn-sm btn-primary" title="Ubah Status"
        //                   onclick=konfirmasiPlan("'.$data->p_id.'")><i class="fa fa-check"></i>
        //               </button>
        //           </div>'; 
        // }
      })
    ->rawColumns(['status', 'action'])
    ->make(true);
  }

	public function terima(Request $request){
		DB::beginTransaction();
		try {

			DB::table('d_pengiriman_dt')
					->where('pd_pengiriman', $request->id)
					->update([						
						'pd_penerima' => Session::get('user_comp'),
						'pd_status_diterima' => 'Y',
					]);


			DB::table('d_pengiriman')
					->where('p_id', $request->id)
					->update([			
						'p_status_diterima' => 'T',
					]);

			$p_code=DB::table('d_pengiriman')
					->where('p_id', $request->id)
					->select('p_code')
					->first();


			$getPengiriman=DB::table('d_pengiriman_dt')
						   ->where('pd_pengiriman', $request->id)->get();

			$date=date('Y-m-d');
			foreach ($getPengiriman as $data) {
				$simpanMutasi=mutasi::simpanTranferMutasi($data->pd_item,$data->pd_qty,$data->pd_comp,$data->pd_position,$flag='Penerimaan',$p_code->p_code,$ket='e',$date,$data->pd_comp,$data->pd_comp,1,'Penerimaan Penjualan');
			}


			
						


			DB::commit();
			return response()->json([
				'status' => 'berhasil'
			]);
		} catch (\Exception $e) {

			DB::rollback();
			return response()->json([
				'status' => 'gagal'
			]);
		}

	}

}
