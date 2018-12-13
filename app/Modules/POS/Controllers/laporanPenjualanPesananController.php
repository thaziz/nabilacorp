<?php

namespace App\Modules\POS\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use app\Customer;
use Carbon\carbon;

use App\m_item;

use App\Http\Controllers\Controller;

use App\mMember;
use App\Modules\POS\model\d_receivable;
use App\Modules\POS\model\d_receivable_dt;
use Datatables;
use DB;
use Excel;


class laporanPenjualanPesananController  extends Controller
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
//http://localhost/nabilacorp/penjualan/rencanapenjualan/rencana#listtoko
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function receivableDt ($id){
       return $data=d_receivable_dt::
              where('rd_receivable',$id)              
             ->orderBy('rd_detailid')
             ->get();
    }

    public function index() {      
      return view('POS::laporanPenjualanPesanan/index');
    }
    public function table(Request $req) {            
       $shift      = $req->shift;                
       $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));
       $tgl_akhir  = date('Y-m-d',strtotime($req->tgl_akhir));


       $data=d_receivable::
             get();
      /*$data2=d_receivable::
              join('d_receivable_dt',function($join){
                  $join->on('r_id','=','rd_receivable');                   
                  $join->where('rd_status','N');
              })
             ->get();*/
      

      return Datatables::of($data)                       
                      ->addIndexColumn()                                                 
                      ->editColumn('r_date', function ($data) {                            
                                return date('d-m-Y',strtotime($data->r_date));                            
                        })
                      ->editColumn('r_reff', function ($data) {                            
                                return $data->r_code;
                        })
                      ->editColumn('r_value', function ($data) {                            
                                return '<div style="width:100%;text-align:right">'.number_format($data->r_value,2,',','.');   
                        })
                      ->editColumn('r_outstanding', function ($data) {                            
                                return '<div style="width:100%;text-align:right">'.number_format($data->r_outstanding,2,',','.');   
                        })
                      ->editColumn('r_cus', function ($data) {                            
                                return $data->r_customer_name;   
                        })                         
                      ->editColumn('Terbayar', function ($data) {                  
                                $dt=$this->receivableDt($data->r_id);
                                $html='';
                                foreach ($dt as $key => $dataDt) {
                                  $html.= $dataDt->rd_value.'<br>';
                                }
                                return $html;                      
                      })   
                      ->editColumn('jml', function ($data) {                  
                                $dt=$this->receivableDt($data->r_id);                                
                                $html='';
                                foreach ($dt as $key => $dataDt) {                                  
                                  $html.= '<div style="width:100%;text-align:right">'.number_format($dataDt->rd_value,2,',','.').'<br>';
                                }
                                return $html;                      
                      })           
                      ->editColumn('tgl', function ($data) {                  
                                $dt=$this->receivableDt($data->r_id);
                                $html='';
                                foreach ($dt as $key => $dataDt) {
                                  $html.='<div style="width:100%;text-align:center">'.date('d-m-Y',strtotime($dataDt->rd_datepay)).'<br>';
                                }
                                return $html;                      
                      })           
                      ->rawColumns(['tgl','jml','r_value','r_outstanding'])         
                      ->make(true); 
    
        
             
       
    }

    public function find_d_sales_dt(Request $req) {
       
        $shift      = $req->shift;        
        
       $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));
       $tgl_akhir  = date('Y-m-d',strtotime($req->tgl_akhir));
    
      if($shift=='A'){
          $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));                    

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_date', [$tgl_awal, $tgl_awal])     
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total','sd_disc_percentvalue')->orderBy('sd_date', 'ASC')
            ->get();

          
        }else if($shift=='1'){          
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'06:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])    
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total','sd_disc_percentvalue')->orderBy('sd_date', 'ASC')
            ->get();

        }else if($shift=='2'){
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'21:00'));
          
          $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])      
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total','sd_disc_percentvalue')->orderBy('sd_date', 'ASC')
            ->get();
        }











  return Datatables::of($rows)                         
                      ->editColumn('s_date', function ($rows) {                           
                                return date('d-M-Y',strtotime($rows->s_date));
                        })
                      ->editColumn('sd_total', function ($rows) {                           
                                return number_format($rows->sd_total,'2',',','.');
                      })->editColumn('sd_disc_value', function ($rows) {                           
                                return number_format($rows->sd_disc_value,'2',',','.');
                      })->editColumn('sd_price', function ($rows) {                           
                                return number_format($rows->sd_price,'2',',','.');
                      })->make(true);    













    }

    
    
    public function totalPenjualan(Request $req){
       $rows       ='';
       $shift      = $req->shift;                
       $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));
       $tgl_akhir  = date('Y-m-d',strtotime($req->tgl_akhir));
          
      if($shift=='A'){
          $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));                    

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_date', [$tgl_awal, $tgl_awal])                             
            ->select(DB::raw("SUM(sd_disc_value) as sd_disc_value"),
                     DB::raw("SUM(sd_disc_percentvalue) as sd_disc_percentvalue"),
                     DB::raw("SUM(sd_total) as sd_total")
                     )
              ->orderBy('sd_date', 'ASC')
            ->first();
            

          
        }else if($shift=='1'){          
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'06:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])                            
            ->select(DB::raw("SUM(sd_disc_value) as sd_disc_value"),
                     DB::raw("SUM(sd_disc_percentvalue) as sd_disc_percentvalue"),
                     DB::raw("SUM(sd_total) as sd_total")
                     )
            ->orderBy('sd_date', 'ASC')
            ->first();

        }else if($shift=='2'){
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'21:00'));
          
          $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
            ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])      
            ->select(DB::raw("SUM(sd_disc_value) as sd_disc_value"),
                     DB::raw("SUM(sd_disc_percentvalue) as sd_disc_percentvalue"),
                     DB::raw("SUM(sd_total) as sd_total")
                     )
            ->orderBy('sd_date', 'ASC')
            ->first();
        }
        /*dd($rows->sd_disc_percentvalue);*/
        $data=[                
                'sd_disc_value'=>number_format($rows->sd_disc_percentvalue+$rows->sd_disc_value,2,',','.'),
                'sd_total'=>number_format($rows->sd_total,2,',','.')

                ];

        return json_encode($data);


    }
    public function print_laporan_excel(Request $req) {
        $data = array();
        $rows=null;

        $shift      = $req->shift;        
        
       $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));
       $tgl_akhir  = date('Y-m-d',strtotime($req->tgl_akhir));
    
      if($shift=='A'){
          $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));                    

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_date', [$tgl_awal, $tgl_awal])     
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();

          
        }else if($shift=='1'){          
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'06:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));

           $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])    
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();

        }else if($shift=='2'){
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'21:00'));
          
          $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])      
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();
        }




       // Menghitung total
       $total_discountPercent=0;
       $total_discount = 0;
       $total_discountvalue = 0;
       $grand_total = 0;

       foreach ($rows as $detail) {        
         $subtotal = ($detail->sd_qty * $detail->sd_price);
         $total_discountPercent += $detail->sd_disc_percentvalue;
         $total_discountvalue += $detail->sd_disc_value;
         $grand_total += $detail->sd_total;         
       }

      Excel::create('Transaction '.date('d-m-y'), function($excel) use ($grand_total,$total_discountvalue,$total_discountPercent,$rows){        
            $excel->sheet('New sheet', function($sheet) use ($grand_total,$total_discountvalue,$total_discountPercent,$rows) {
                $sheet->loadView('POS::laporanPenjualanToko/print_laporan_excel')
                ->with('data',$rows)
                ->with('grand_total',$grand_total)
                ->with('total_discountPercent',$total_discountPercent)
                ->with('total_discountvalue',$total_discountvalue);

            });

        })->download('xls');

    }
    public function print_laporan(Request $req) {
         $data = array();
        $rows=null;

        $shift      = $req->shift;        
        
       $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));
       $tgl_akhir  = date('Y-m-d',strtotime($req->tgl_akhir));
    
      if($shift=='A'){
          $tgl_awal   = date('Y-m-d',strtotime($req->tgl_awal));                    

    $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_date', [$tgl_awal, $tgl_awal])     
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();

          
        }else if($shift=='1'){          
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'06:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));

           $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])    
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();

        }else if($shift=='2'){
          $tgl_awal1   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'13:00'));
          $tgl_awal2   = date('Y-m-d G:i:s',strtotime($req->tgl_awal.' '.'21:00'));
          
          $rows = d_sales_dt::leftJoin('d_sales', function($join) {
                $join->on('sd_sales', '=', 's_id');
              })->where('s_channel', 'Toko')
              ->whereBetween('s_insert', [$tgl_awal1, $tgl_awal2])      
            ->join('m_item','i_id','=','sd_item')
            ->join('m_satuan','m_satuan.s_id','=','i_sat1')->select('m_item.i_name','s_note','s_date','s_nama_cus','s_detname','sd_qty','sd_price','sd_disc_value','sd_disc_percent','sd_total')->orderBy('sd_date', 'ASC')
            ->get();
        }




       // Menghitung total
       $total_discountPercent=0;       
       $total_discountvalue = 0;
       $grand_total = 0;

       foreach ($rows as $detail) {        
         $subtotal = ($detail->sd_qty * $detail->sd_price);
         $total_discountPercent += $detail->sd_disc_percentvalue;
         $total_discountvalue += $detail->sd_disc_value;
         $grand_total += $detail->sd_total;         
       }

      
       $res = array('data' => $rows,
                    'grand_total' => $grand_total, 
                    'total_discountPercent' => $total_discountPercent,
                    'total_discountvalue' => $total_discountvalue,        
                    'tgl1'=>$tgl_awal                    
                    );
       
      return view('POS::laporanPenjualanToko/print_laporan', $res);
    }
    
}
