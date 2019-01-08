<?php

namespace App\Modules\POS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_sales_return;

use App\Modules\POS\model\d_sales;
use App\Modules\POS\model\d_sales_dt;

use App\d_sales_returndt;
use App\d_sales_returnsb;
use Datatables;
use App\Http\Requests;
use DB;
use Response;

class ManajemenReturnPenjualanController extends Controller
{
    public function r_penjualan(){
    
    return view('POS::manajemenreturn.index');
  }

    public function tabel(){
    $return = d_sales_return::all();

    $url = url('/penjualan/manajemenreturn/preview/');

    return DataTables::of($return)

    ->editColumn('dsr_date', function ($data) {
       return date('d M Y', strtotime($data->dsr_date));
    })

    ->editColumn('dsr_type_sales', function ($data)  {
            if ($data->dsr_type_sales == "RT")
            {
                return 'Retail';
            }
            elseif ($data->dsr_type_sales == "GR")
            {
                return 'Grosir';
            }
        })

    ->editColumn('dsr_status', function ($data)  {
            if ($data->dsr_status == "WT")
            {
                return '<div class="text-center">
                          <span class="label label-yellow">Waiting</span>
                        </div>';
            }
            elseif ($data->dsr_status == "TL")
            {
                return '<div class="text-center">
                            <span class="label label-red">Di Tolak</span>
                        </div>';
            } elseif ($data->dsr_status == "TR")
            {
                return '<div class="text-center">
                            <span class="label label-blue">Di Setujui</span>
                        </div>';
            } elseif ($data->dsr_status == "FN")
            {
              return '<div class="text-center">
                            <span class="label label-green">Selesai</span>
                        </div>';
            }
        })

    ->editColumn('dsr_method', function ($data)  {
            if ($data->dsr_method == "TB")
            {
                return 'Tukar Barang';
            }
            elseif ($data->dsr_method == "PN")
            {
                return 'Pemotongan Nota';
            }
             elseif ($data->dsr_method == "SB")
            {
                return 'Salah Barang';
            }
             elseif ($data->dsr_method == "SA")
            {
                return 'Salah Alamat';
            }
             elseif ($data->dsr_method == "KB")
            {
                return 'Kurang Barang';
            }
        })

    ->editColumn('dsr_jenis_return', function ($data)  {
            if ($data->dsr_jenis_return == "BR")
            {
                return 'Barang Rusak';
            }
            elseif ($data->dsr_jenis_return == "KB")
            {
                return 'Kelebihan Barang';
            }
        })
    ->editColumn('description',function ($data)
            {
              return  '<div class="text-center">
                        <select class="form-control" name="description[]">
                          <option value="Kelebihan">Kelebihan</option>
                          <option value="Rusak">Rusak</option>
                        </select>
                      </div>';# code...
            })

    ->addColumn('action', function($data){
      if ($data->dsr_method == 'SB' || $data->dsr_method == 'SA') {

        if ($data->dsr_status == "WT"){
          return  '<div class="text-center">
                      <button type="button"
                          class="btn btn-success fa fa-eye btn-sm"
                          title="detail"
                          
                          onclick="location.href=\'' . $url . $data->dsr_id . '\'"
                          >
                      </button>
                      <a  onclick="distroyNota('.$data->dsr_id.')"
                          class="btn btn-danger btn-sm"
                          title="Hapus">
                          <i class="fa fa-trash-o"></i></a>
                    </div>';
          }elseif ($data->dsr_status == "TL") {
            return  '<div class="text-center">
                        <button type="button"
                            class="btn btn-success fa fa-eye btn-sm"
                            title="detail"
                            onclick="location.href=\'' . $url . $data->dsr_id . '\'"
                            >
                        </button>
                        <a  onclick="distroyNota('.$data->dsr_id.')"
                            class="btn btn-danger btn-sm"
                            title="Hapus">
                            <i class="fa fa-trash-o"></i></a>
                      </div>';
          }else{
            if ($data->dsr_status_terima == 'WT'){
              return '<div class="text-center">
                        <button type="button"
                            class="btn btn-success fa fa-eye btn-sm"
                            title="detail"
                            data-toggle="modal"
                            onclick="location.href=\'' . $url . $data->dsr_id . '\'"
                            data-target="#myItemSB">
                        </button>
                        <button type="button"
                            class="btn btn-success fa fa-check btn-sm"
                            title="Terima Barang"
                            data-toggle="modal"
                            onclick="lihatDetailTerimaSB('.$data->dsr_id.')"
                            data-target="#myItemTerimaSB">
                        </button>
                      </div>';
            }else{
              return '<div class="text-center">
                        <button type="button"
                            class="btn btn-success fa fa-eye btn-sm"
                            title="detail"
                            onclick="location.href=\'' . $url . $data->dsr_id . '\'"
                            >
                        </button>
                      </div>';
            }
            
         }

      }else{

        if ($data->dsr_status == "WT"){
          return  '<div class="text-center">
                      <button type="button"
                          class="btn btn-success fa fa-eye btn-sm"
                          title="detail"
                          data-toggle="modal"
                          onclick="lihatDetail('.$data->dsr_id.')"
                          data-target="#myItem">
                      </button>
                      <a  onclick="distroyNota('.$data->dsr_id.')"
                          class="btn btn-danger btn-sm"
                          title="Hapus">
                          <i class="fa fa-trash-o"></i></a>
                    </div>';
          }elseif ($data->dsr_status == "TL") {
            return  '<div class="text-center">
                        <button type="button"
                            class="btn btn-success fa fa-eye btn-sm"
                            title="detail"
                            data-toggle="modal"
                            onclick="lihatDetail('.$data->dsr_id.')"
                            data-target="#myItem">
                        </button>
                        <a  onclick="distroyNota('.$data->dsr_id.')"
                            class="btn btn-danger btn-sm"
                            title="Hapus">
                            <i class="fa fa-trash-o"></i></a>
                      </div>';
          }else{
            return '<div class="text-center">
                        <button type="button"
                            class="btn btn-success fa fa-eye btn-sm"
                            title="detail"
                            data-toggle="modal"
                            onclick="lihatDetail('.$data->dsr_id.')"
                            data-target="#myItem">
                        </button>
                      </div>';
          }

        }
         
        })
      
    ->rawColumns(['dsr_date','description','dsr_status','dsr_method','dsr_jenis_return','action'])
    ->make(true);
  }

  public function newreturn(){
    
    $nota = DB::table('d_sales')->get();
    return view('POS::manajemenreturn.return-penjualan',compact('nota'));
  }

  public function carinota(Request $request){
    // return 's';
    // dd($request->all());
    // $nota = DB::table('d_sales')->get();
      // $formatted_tags = array();
      $term = trim($request->q);

      $condition = [
        ['s_status', '=', 'final'],
        ['s_channel', '=', 'Toko']
      ];
      $d_sales = d_sales::where($condition);
      if($term != '') {
        $d_sales = $d_sales->where('s_note', $term);
      }
      $d_sales = $d_sales->take(50)->get();
      return Response::json($d_sales);

  }
  public function getdata($id) {
    $data = d_sales::leftJoin('d_sales_dt','sd_sales','=','s_id')
      ->leftJoin('m_item','i_id','=','sd_item');

    $data = select(
      's_gross',
      's_disc_percent',
      's_disc_value',
      's_net',
      's_nama_cus',
      's_alamat_cus',
      's_channel')     
      ->where('s_id',$id)
      ->first();

      return Response::json($data);
  }

  public function preview($id) {
    $d_sales_return = d_sales_return::leftJoin('m_customer', 'dsr_cus', '=', 'c_id');
    $d_sales_return = $d_sales_return->where('dsr_id', $id)->first();

    $d_sales_returndt = d_sales_returndt::leftJoin('m_item', 'i_id', '=', 'dsrdt_item');
    $d_sales_returndt = $d_sales_returndt->where('dsrdt_idsr', $id);

    $res = [
        'd_sales_return' => $d_sales_return,
        'd_sales_returndt' => $d_sales_returndt
    ];

    return view('POS::manajemenreturn.preview', $res);
  }

  public function tabelpnota($id,$metode)
  {
    $sales = DB::table('d_sales_dt')
      ->join('m_item','i_id','=','sd_item')
      ->join('m_satuan','m_satuan.s_id','=','i_sat1')
      ->where('sd_sales',$id)
      ->get();
    return view('POS::manajemenreturn.data-detail-return',compact('sales','metode'));
      
  }

  public function store(Request $request,$id)
  {
    // dd($request->all());
    if ($request->t_return == null) {
       $t_return =0;    # code...
    }else{
      $t_return = str_replace(['Rp', '\\', '.', ' '], '', $request->t_return);
    }
    $replaceCharDisc = (int)str_replace("%","",$request->diskonHarga);
    $replaceCharPPN = (int)str_replace("%","",$request->ppnHarga);

    $s_gross = str_replace(['Rp', '\\', '.', ' '], '', $request->s_gross);
    $total_diskon = str_replace(['Rp', '\\', '.', ' '], '', $request->total_diskon);
    $total_value = str_replace(['Rp', '\\', '.', ' '], '', $request->total_value);
    $total_percent = str_replace(['Rp', '\\', '.', ' '], '', $request->total_percent);
    $s_net = str_replace(['Rp', '\\', '.', ' '], '', $request->s_net);


    


      $sr_id = DB::table('d_sales_return')->max('sr_id')+1;
     
      $query = DB::select(DB::raw("SELECT MAX(RIGHT(sr_id,4)) as kode_max from d_sales_return WHERE DATE_FORMAT(sr_created, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')"));
     
      $kd = "";

      if(count($query)>0)
      {
        foreach($query as $k)
        {
          $tmp = ((int)$k->kode_max)+1;
          $kd = sprintf("%05s", $tmp);
        }
      }
      else
      {
        $kd = "00001";
      }
      
      $p_code = "RT-".date('ym')."-".$kd;

    $data_head = DB::table('d_sales_return')->insert([
          'sr_id'=>$sr_id,
          'sr_sales'=>$request->id_sales,
          'sr_customer'=>$request->idSup,
          // 'sr_alamat'=>$request->,
          'sr_code'=>$p_code,
          'sr_method'=>$id,
          // 'sr_jenis_return'=>$request->,
          // 'sr_type_sales'=>$request->,
          'sr_date'=>$request->tanggal,

          'sr_price_return'=>$request->t_return,
          'sr_sgross'=>$s_gross,  
          'sr_disc_vpercent'=>$total_diskon,
          'sr_disc_value'=>$total_value,
          'sr_net'=>$s_net,
          // 'sr_status'=>,
          // 'sr_status_terima'=>, 
          // 'sr_resi'=>, 
          'sr_created'=>date('Y-md h:i:s'), 
          // 'sr_updated'=>, 
    ]);

    for ($i=0; $i <count($request->i_id) ; $i++) { 
      $sd_price = str_replace(['Rp', '\\', '.', ' '], '', $request->sd_price);
      $sd_total = str_replace(['Rp', '\\', '.', ' '], '', $request->sd_total);
      $sd_return = str_replace(['Rp', '\\', '.', ' '], '', $request->sd_return);

        $data_head = DB::table('d_salesreturn_dt')->insert([
          'srdt_salesreturn'=>$sr_id,
          'srdt_detailid'=>$i+1,
          'srdt_item'=>$request->i_id[$i],
          'srdt_qty'=>$request->sd_qty[$i],
          // 'sr_alamat'=>$request->,
          'srdt_qty_confirm'=>$request->sd_qty_return[$i],
          'srdt_price'=>$sd_price[$i],
          // 'sr_jenis_return'=>$request->,
          // 'sr_type_sales'=>$request->,
          'srdt_disc_percent'=>$request->sd_disc_percent[$i],

          'srdt_disc_vpercent'=>$request->value_disc_percent[$i],
          'srdt_disc_vpercentreturn'=>$request->sd_disc[$i],  
          'srdt_return_price'=>$sd_return[$i],
          'srdt_disc_value'=>$request->sd_disc_value[$i],
          'srdt_return_price'=>$s_net[$i],
          // 'sr_status'=>,
          // 'sr_status_terima'=>, 
          'srdt_hasil'=>$sd_total[$i], 
          'srdt_created'=>date('Y-md h:i:s'), 
          // 'sr_updated'=>, 

        ]);
    
        $data_stock = DB::table('d_stock')->insert([
          'srdt_item'=>$request->i_id[$i],
          'srdt_qty_confirm'=>$request->sd_qty_return[$i],
          

        ]);
    
    }
  }


}
