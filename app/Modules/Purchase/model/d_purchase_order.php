<?php

namespace App\Modules\Purchase\model;

use Illuminate\Database\Eloquent\Model;

use App\Lib\format;

use App\m_item;

use DB;

use Auth;

use Datatables;

use Carbon\Carbon;

use Response;



class d_purchase_order extends Model
{  






    protected $table = 'd_purchase_order';
    protected $primaryKey = 'po_id';
    const CREATED_AT = 'po_created';
    const UPDATED_AT = 'po_updated';
    
      protected $fillable =  ['po_id',
                              'po_date',
                              'po_purchaseplan',
                              'po_supplier',
                              'po_code',
                              'po_mem',
                              'po_method',
                              'po_total_gross',
                              'po_discount',
                              'po_disc_percent',
                              'po_disc_value',
                              'po_tax_percent',
                              'po_tax_value',
                              'po_total_net',
                              'po_received',
                              'po_date_confirm',
                              'po_duedate',
                              'po_status',
                              'po_created',
                              'po_updated'];
  
    static function dataOrder($request)
    {
        $data = d_purchase_order::join('m_supplier','s_id','=','po_supplier')
                ->join('d_mem','po_mem','=','m_id')
                ->select(
                              'po_id',
                              'po_date',
                              'po_purchaseplan',
                              'po_supplier',
                              'po_code',
                              'po_mem',
                              'po_method',
                              'po_total_gross',
                              'po_discount',
                              'po_disc_percent',
                              'po_disc_value',
                              'po_tax_percent',
                              'po_tax_value',
                              'po_total_net',
                              'po_received',
                              'po_date_confirm',
                              'po_duedate',
                              'po_status',
                              'po_created',
                              'po_updated',
                              'm_id',
                              'm_name',
                              's_company'


                  )
                //->where('po_status', '=', 'FN')
                ->orderBy('po_date', 'DESC')
                ->get();
        
        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('status', function ($data)
          {
          if ($data->po_status == "WT") 
          {
            return '<span class="label label-default">Waiting</span>';
          }
          elseif ($data->po_status == "DE") 
          {
            return '<span class="label label-warning">Dapat diedit</span>';
          }
          elseif ($data->po_status == "CF") 
          {
            return '<span class="label label-info">Disetujui</span>';
          }
          else
          {
            return '<span class="label label-success">Selesai</span>';
          }
        })
        ->editColumn('tglOrder', function ($data) 
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
        ->editColumn('hargaTotalNet', function ($data) 
        {
          return 'Rp. '.number_format($data->po_total_net,0,",",".");
        })
        ->editColumn('tglMasuk', function ($data) 
        {
          if ($data->po_date_received == null) 
          {
              return '-';
          }
          else 
          {
              return $data->po_date_received ? with(new Carbon($data->po_date_received))->format('d M Y') : '';
          }
        })
        ->addColumn('action', function($data)
          {
            if ($data->po_status == "WT") 
            {
              return '<div class="text-center">
                          <button class="btn btn-sm btn-success" title="Detail"
                              onclick=detailOrder("'.$data->po_id.'")><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit"
                              onclick=editOrder("'.$data->po_id.'")><i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" title="Delete"
                              onclick=deleteOrder("'.$data->po_id.'")><i class="glyphicon glyphicon-trash"></i>
                          </button>
                      </div>'; 
            }
            elseif ($data->po_status == "DE") 
            {
              return '<div class="text-center">
                          <button class="btn btn-sm btn-success" title="Detail"
                              onclick=detailOrder("'.$data->po_id.'")><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit"
                              onclick=editOrder("'.$data->po_id.'")><i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" title="Delete"
                              onclick=deleteOrder("'.$data->po_id.'") disabled><i class="glyphicon glyphicon-trash"></i>
                          </button>
                      </div>'; 
            }
            else
            {
              return '<div class="text-center">
                          <button class="btn btn-sm btn-success" title="Detail"
                              onclick=detailOrder("'.$data->po_id.'")><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit"
                              onclick=editOrder("'.$data->po_id.'") disabled><i class="glyphicon glyphicon-edit"></i>
                          </button>
                          <button class="btn btn-sm btn-danger" title="Delete"
                              onclick=deleteOrder("'.$data->po_id.'") disabled><i class="glyphicon glyphicon-trash"></i>
                          </button>
                      </div>'; 
            }
            
          })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }



     static function getDataForm($id)
    {    
          $dataIsi = d_purchaseplan_dt::join('m_item','ppdt_item','=','i_id')
                                ->join('m_satuan', 's_id', '=', 'i_satuan')
                                ->join('d_stock','s_item','=','i_id')
                                ->select('i_id',
                                         'm_item.i_code',
                                         'm_item.i_name',
                                         's_name',                                         
                                         'ppdt_qty',
                                         'ppdt_qtyconfirm',
                                         'ppdt_prevcost',
                                         's_qty',
                                         'ppdt_pruchaseplan',
                                         'ppdt_detailid'
                                )
                                ->where('ppdt_pruchaseplan', '=', $id)
                                ->where('ppdt_ispo', '=', "FALSE")                                
                                ->where('ppdt_isconfirm', '=', "TRUE")
                                ->orderBy('ppdt_created', 'DESC')
                                ->get();

      
        return response()->json([
            'status' => 'sukses',
            'data_isi' => $dataIsi,                        
        ]);
    }
    

     static function getDataCodePlan($request)
    {
        $formatted_tags = array();
        $term = $request->term;        
        if (empty($term)) {
            $sup = DB::table('d_purchase_plan')
                     ->select('p_code', 'p_id','s_id','s_company')
                     ->join('d_purchaseplan_dt','ppdt_pruchaseplan','=','p_id')
                     ->join('m_supplier','s_id','=','p_supplier')
                     ->where('ppdt_isconfirm', '=', "TRUE")
                     ->where('ppdt_ispo', '=', "FALSE")
                     ->groupBy('p_code','p_id','s_id','s_company')
                     ->get();
            foreach ($sup as $val) {
                $formatted_tags[] = ['p_id' => $val->p_id, 'label' => $val->p_code,'s_company'=>$val->s_company,'s_id'=>$val->s_id];
            }
            return Response::json($formatted_tags);
        }
        else
        {            
            $sup = DB::table('d_purchase_plan')
                     ->select('p_code', 'p_id','s_id','s_company')
                     ->join('d_purchaseplan_dt','ppdt_pruchaseplan','=','p_id')
                     ->join('m_supplier','s_id','=','p_supplier')
                     ->where('ppdt_isconfirm', '=', "TRUE")
                     ->where('ppdt_ispo', '=', "FALSE")
                     ->where('p_code', 'LIKE', '%'.$term.'%')
                     ->groupBy('p_code','p_id','s_id','s_company')
                     ->get();
            foreach ($sup as $val) {
                $formatted_tags[] = ['p_id' => $val->p_id, 'label' => $val->p_code,'s_company'=>$val->s_company,'s_id'=>$val->s_id];
            }
            return Response::json($formatted_tags);  
        }
    } 




    

  
}
	
	