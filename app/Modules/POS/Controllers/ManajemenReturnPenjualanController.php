<?php

namespace App\Modules\POS\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\d_sales_return;
use App\d_sales_returndt;
use App\d_sales_returnsb;
use Datatables;
use App\Http\Requests;

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
      
    ->rawColumns(['dsr_date','dsr_status','dsr_method','dsr_jenis_return','action'])
    ->make(true);
  }

  public function newreturn(){
    

    return view('POS::manajemenreturn.return-pembelian');
  }
}
