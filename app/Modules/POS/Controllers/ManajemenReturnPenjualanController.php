<?php

namespace App\Modules\POS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_sales_return;
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
                        <select class="form-control">
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
                          data-toggle="modal"
                          onclick="lihatDetailSB('.$data->dsr_id.')"
                          data-target="#myItemSB">
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
                            onclick="lihatDetailSB('.$data->dsr_id.')"
                            data-target="#myItemSB">
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
                            onclick="lihatDetailSB('.$data->dsr_id.')"
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
                            data-toggle="modal"
                            onclick="lihatDetailSB('.$data->dsr_id.')"
                            data-target="#myItemSB">
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
    return view('POS::manajemenreturn.return-pembelian',compact('nota'));
  }

  public function carinota(Request $request){
    // return 's';
    // dd($request->all());
    // $nota = DB::table('d_sales')->get();
    $formatted_tags = array();
    $term = trim($request->q);
    if (empty($term)) {
      $sup = DB::table('d_sales')->
        where(function ($query){
          $query->where('s_channel', '=', 'Toko')
                ->where('s_status', '=', 'final');
        })
        // ->orWhere(function ($query){
        //   $query->where('s_channel', '=', 'GR')
        //         ->where('s_status', '=', 'RC');
        // })
        ->limit(50)
        ->get();
      foreach ($sup as $val) {
          $formatted_tags[] = [ 'id' => $val->s_id, 
                                'text' => $val->s_note .'-'. 
                                          $val->s_channel .'-'.
                                          date('d M Y', strtotime($val->s_date))];
      }
      return Response::json($formatted_tags);
    }
    else
    {
      $sup = DB::table('d_sales')->
        where(function ($query){
          $query->where('s_channel', '=', 'Toko')
                ->where('s_status', '=', 'final');
        })    
        ->where(function ($b) use ($term) {
                $b->orWhere('s_note', 'LIKE', '%'.$term.'%')
                  ->orWhere('s_channel', 'LIKE', '%'.$term.'%')
                  ->orWhere('s_date', 'LIKE', '%'.$term.'%');
            })
        ->limit(50)
        ->get();
      foreach ($sup as $val) {
          $formatted_tags[] = [ 'id' => $val->s_id, 
                                'text' => $val->s_note .'-'. 
                                          $val->s_channel .'-'.
                                          date('d M Y', strtotime($val->s_date))];
      }

      return Response::json($formatted_tags);  
    }

  }
  public function getdata($id)
  {
    $data = DB::table('d_sales')->select('c_name',
                            'c_hp1',
                            'c_hp2',
                            'c_address',
                            'c_type',
                            's_gross',
                            's_disc_percent',
                            's_disc_value',
                            's_net',
                            's_channel',
                            'pm_name')
      ->join('m_customer','c_id','=','s_customer')
      ->join('d_sales_dt','sd_sales','=','s_id')
      ->join('m_item','i_id','=','sd_item')
      ->join('d_sales_payment','sp_sales','=','s_id')
      ->join('m_paymentmethod','pm_id','=','sp_paymentid')
      ->where('s_id',$id)
      ->get();

      return Response::json($data);
  }
  public function tabelpnota($id)
  {
    $data = DB::table('d_sales_dt')
      ->join('m_item','i_id','=','sd_item')
      ->join('m_satuan','m_satuan.s_id','=','i_sat1')
      ->where('sd_sales',$id)
      ->get();

    return DataTables::of($data)
    ->editColumn('i_name', function ($data) {
      return '<input  name="i_name[]" readonly 
                      class="form-control text-right" 
                      value="'.$data->i_name.'">
              <input  name="i_id[]" readonly 
                      type="hidden"
                      class="form-control text-right" 
                      value="'.$data->i_id.'">';
    })
    ->editColumn('sd_qty', function ($data) {
      return '<input  name="sd_qty[]" readonly 
                      class="form-control text-right qty-item" 
                      value="'.$data->sd_qty.'">';
    })
    ->editColumn('sd_qty_return', function ($data) {
      return '<input  name="sd_qty_return[]"  
                      class="form-control text-right qtyreturn" 
                      value="0"
                      type="text"
                      onkeyup="qtyReturn(this, event);autoJumlahNet();">
              <input  name="sd_qty-return[]"  
                      class="form-control text-right qty-return"
                      style="display:none" 
                      value="0">';
    })
    ->editColumn('sd_price', function ($data) {
      return '<input name="sd_price[]" readonly 
                    class="form-control text-right harga-item" 
                    value="Rp. '.number_format($data->sd_price,2,',','.').'">';
    })
    ->editColumn('sd_disc_percent', function ($data) {
      if ($data->sd_disc_percent == 0 && $data->sd_disc_value == 0.00) {
        return '<div class="input-group">
                <input  name="sd_disc_percent[]" 
                        class="form-control text-right dPersen-item discpercent" 
                        value="'.$data->sd_disc_percent.'" 
                        onkeyup="discpercent(this, event);autoJumlahDiskon()">
                        <span class="input-group-addon" id="basic-addon1">%</span>
              </div>
                <input  name="value_disc_percent[]" 
                        class="form-control value-persen totalPersen" 
                        style="display:none"
                        value="'.(int)$data->sd_disc_percentvalue.'">';
      }else if ($data->sd_disc_percent == 0) {
        return '<div class="input-group">
                <input  name="sd_disc_percent[]" 
                        class="form-control text-right dPersen-item discpercent" 
                        value="'.$data->sd_disc_percent.'" 
                        readonly
                        onkeyup="discpercent(this, event);autoJumlahDiskon()">
                        <span class="input-group-addon" id="basic-addon1">%</span>
              </div>
                <input  name="value_disc_percent[]" 
                        class="form-control value-persen totalPersen" 
                        style="display:none"
                        value="'.(int)$data->sd_disc_percentvalue.'">';
      }else{
        return '<div class="input-group">
                <input  name="sd_disc_percent[]" 
                        class="form-control text-right dPersen-item discpercent" 
                        value="'.$data->sd_disc_percent.'" 
                        onkeyup="discpercent(this, event);autoJumlahDiskon()">
                        <span class="input-group-addon" id="basic-addon1">%</span>
              </div>
                <input  name="value_disc_percent[]" 
                        class="form-control value-persen totalPersen" 
                        style="display:none"
                        value="'.(int)$data->sd_disc_percentvalue.'">';
      }
      
    })
    ->editColumn('sd_disc_value', function ($data) {
      if ($data->sd_disc_value == 0.00 && $data->sd_disc_percent == 0) {
        return '<input  name="sd_disc[]" 
                      type="text"
                      class="form-control text-right field_harga discvalue dValue-item" 
                      onkeyup="discvalue(this, event);autoJumlahDiskon()"
                      value="Rp. '.number_format($data->sd_disc_value / $data->sd_qty,2,',','.').'">
                <input  name="sd_disc_value[]" 
                      type="text"
                      style="display:none"
                      class="form-control text-right sd_disc_value totalPersen" 
                      value="'.(int)$data->sd_disc_value.'">';

      }else if($data->sd_disc_value == 0.00 ) {
        return '<input  name="sd_disc[]" 
                      type="text"
                      class="form-control text-right field_harga discvalue dValue-item" 
                      onkeyup="discvalue(this, event);autoJumlahDiskon()"
                      readonly
                      value="Rp. '.number_format($data->sd_disc_value / $data->sd_qty,2,',','.').'">
                <input  name="sd_disc_value[]" 
                      type="text"
                      style="display:none"
                      class="form-control text-right sd_disc_value totalPersen"
                      value="'.(int)$data->sd_disc_value.'">';

      }else{
        return '<input  name="sd_disc[]" 
                      type="text"
                      class="form-control text-right field_harga discvalue dValue-item" 
                      onkeyup="discvalue(this, event);autoJumlahDiskon()"
                      value="Rp. '.number_format($data->sd_disc_value / $data->sd_qty,2,',','.').'">
                <input  name="sd_disc_value[]" 
                      type="text"
                      style="display:none"
                      class="form-control text-right sd_disc_value totalPersen" 
                      value="'.(int)$data->sd_disc_value.'">';
      }
      
    })
    ->editColumn('description',function ($data)
          {
            return  '<div class="text-center">
                      <select class="form-control">
                        <option value="Kelebihan">Kelebihan</option>
                        <option value="Rusak">Rusak</option>
                      </select>
                    </div>';# code...
          })
    ->editColumn('sd_return', function ($data) {
      return '<input  name="sd_return[]" readonly 
                      class="form-control text-right hasilReturn" 
                      value="0">';
    })
    ->editColumn('sd_total', function ($data) {
      return '<input  name="sd_total[]" readonly 
                      class="form-control text-right totalHarga totalNet" 
                      value="Rp. '.number_format($data->sd_total,2,',','.').'">';
    })
    ->rawColumns([  'i_name',
                    'sd_qty',
                    'description',
                    'sd_qty_return',
                    'sd_price',
                    'sd_disc_percent',
                    'sd_disc_value',
                    'sd_return',
                    'sd_total'])
    ->make(true);
  }
}
