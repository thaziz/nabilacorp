<?php

namespace App\Modules\Inventory\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\d_stock;
use Datatables;
use App\d_pakai_barang;
use App\d_pakai_barangdt;

class PemakaianBrgGdgController extends Controller
{
    public function barang()
    {
    	$tabIndex = view('Inventory::b_digunakan.tab-index');
    	$tabHistory = view('Inventory::b_digunakan.tab-history');
    	$modal = view('Inventory::b_digunakan.modal');
    	$modalDetail = view('Inventory::b_digunakan.modal-detail');
    	$modalEdit = view('Inventory::b_digunakan.modal-edit');
        return view('Inventory::b_digunakan.index',compact('tabIndex','tabHistory','modal','modalDetail','modalEdit'));
    }

    public function getPemakaianByTgl($tgl1, $tgl2)
    {
        $y = substr($tgl1, -4);
        $m = substr($tgl1, -7,-5);
        $d = substr($tgl1,0,2);
        $tanggal1 = $y.'-'.$m.'-'.$d;

        $y2 = substr($tgl2, -4);
        $m2 = substr($tgl2, -7,-5);
        $d2 = substr($tgl2,0,2);
        $tanggal2 = $y2.'-'.$m2.'-'.$d2;

        $data = d_pakai_barang::join('d_gudangcabang','d_pakai_barang.d_pb_gdg','=','d_gudangcabang.gc_id')
              ->join('d_mem','d_pakai_barang.d_pb_staff','=','d_mem.m_id')
              ->select('d_pakai_barang.*', 'd_mem.m_id', 'd_mem.m_name', 'd_gudangcabang.gc_id', 'd_gudangcabang.gc_cabang')
              ->whereBetween('d_pb_date', [$tanggal1, $tanggal2])
              ->orderBy('d_pb_created', 'DESC')
              ->get();

        return DataTables::of($data)
        ->addIndexColumn()
        ->editColumn('tglBuat', function ($data) 
        {
            if ($data->d_pb_date == null) 
            {
                return '-';
            }
            else 
            {
                return $data->d_pb_date ? with(new Carbon($data->d_pb_date))->format('d M Y') : '';
            }
        })
        ->addColumn('action', function($data)
        {
            return '<div class="text-center">
                        <button class="btn btn-sm btn-success" title="Detail"
                            onclick=detailPemakaian("'.$data->d_pb_id.'")><i class="fa fa-eye"></i> 
                        </button>
                        <button class="btn btn-sm btn-warning" title="Edit"
                            onclick=editPemakaian("'.$data->d_pb_id.'")><i class="glyphicon glyphicon-edit"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" title="Delete"
                            onclick=deletePemakaian("'.$data->d_pb_id.'")><i class="glyphicon glyphicon-trash"></i>
                        </button>
                    </div>'; 
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }
}
