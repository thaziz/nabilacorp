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
use App\d_delivery_orderdt;
use App\d_delivery_order;
use App\d_gudangcabang;
use App\d_stock_mutation;

class PenerimaanBrgProdController extends Controller
{
    public function index()
	{
    
		$modalTerima = view('Inventory::penerimaan.modal');
		$tabelPenerimaan = view('Inventory::penerimaan.tabel_penerimaan');
		$tabPenFinal = view('Inventory::penerimaan.tabel_penerimaan_final');
		$tabPenWaiting = view('Inventory::penerimaan.tabel_penerimaan_waiting');

		return view('Inventory::penerimaan.produksi', compact('modalTerima','tabelPenerimaan','tabPenFinal','tabPenWaiting'));
	}

	public function get_data_sj(Request $request, $comp)
    {
        $formatted_tags = array();
        $term = trim($request->q);
        if (empty($term)) {
            $do = d_delivery_orderdt::select('d_delivery_order.do_nota', 'd_delivery_orderdt.dod_do', 'd_delivery_orderdt.dod_detailid')
                    ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
                    ->where('d_delivery_orderdt.dod_status', '=', 'WT')
                    ->where('do_sendcomp',$comp)
                    ->groupBy('d_delivery_orderdt.dod_do')
                    ->get();

            foreach ($do as $val) {
                $formatted_tags[] = ['id' => $val->dod_do, 'text' => $val->do_nota];
            }
            return \Response::json($formatted_tags);
        }
        else
        {
            $do = d_delivery_orderdt::select('d_delivery_order.do_nota', 'd_delivery_orderdt.dod_do', 'd_delivery_orderdt.dod_detailid')
                    ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
                    ->where('d_delivery_order.do_nota', 'LIKE', '%'.$term.'%')
                    ->where('d_delivery_orderdt.dod_status', '=', 'WT')
                    ->where('do_sendcomp',$comp)
                    ->groupBy('d_delivery_orderdt.dod_do')
                    ->get();

            $formatted_tags = [];

            foreach ($do as $val) {
                $formatted_tags[] = ['id' => $val->dod_do, 'text' => $val->do_nota];
            }

            return \Response::json($formatted_tags);  
        }
    }

    public function list_sj(Request $request)
    {
        $id_sj = trim($request->sj_code);
            
        return response()->json([
            'idSj' => $id_sj,
        ]);
        //return view('/inventory/p_hasilproduksi/tabel_penerimaan',compact('query'));
    }

    public function get_tabel_data($id)
    {
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_order.do_nota', '=', $id)
            ->where('d_delivery_orderdt.dod_status', '=', 'WT')
            ->orderBy('d_delivery_orderdt.dod_update', 'desc')
            ->get();

        return DataTables::of($query)
        ->addIndexColumn()
        ->addColumn('action', function($data)
        {
            if ($data->dod_qty_received == '0' && $data->dod_date_received == null && $data->dod_time_received == null) {
                return '<div class="text-center">
                            <button class="btn btn-sm btn-success" title="Terima"
                                onclick=terimaHasilProduksi("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="fa fa-plus"></i> 
                            </button>&nbsp;
                            
                        </div>';
            }   
        })
        ->editColumn('tanggalTerima', function ($data) 
        {
            if ($data->dod_date_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
            }
        })
        ->editColumn('jamTerima', function ($data) 
        {
            if ($data->dod_time_received == null) 
            {
                return '-';
            }
            else 
            {
                return $data->dod_time_received;
            }
        })
        ->editColumn('status', function ($data) 
        {
            if ($data->dod_status == "WT") 
            {
                return '<span class="label label-info">Waiting</span>';
            }
            elseif ($data->dod_status == "FN") 
            {
                return '<span class="label label-success">Final</span>';
            }
        })
        //inisisai column status agar kode html digenerate ketika ditampilkan
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function terima_hasil_produksi($dod_do, $dod_detailid){
        $query = d_delivery_orderdt::select(
                                        'd_delivery_order.do_nota', 
                                        'd_delivery_orderdt.dod_do',
                                        'd_delivery_orderdt.dod_detailid',
                                        'd_delivery_orderdt.dod_item',
                                        'd_delivery_orderdt.dod_prdt_productresult',
                                        'd_delivery_orderdt.dod_prdt_detail',
                                        'm_item.i_name',
                                        'd_delivery_orderdt.dod_qty_send',
                                        'd_delivery_orderdt.dod_qty_received',
                                        'd_delivery_orderdt.dod_date_received',
                                        'd_delivery_orderdt.dod_time_received',
                                        'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_do', '=', $dod_do)
            ->where('d_delivery_orderdt.dod_detailid', '=', $dod_detailid)
            ->where('d_delivery_orderdt.dod_status', '=', 'WT')
            ->get();

         echo json_encode($query);
    }

    public function simpan_update_data(Request $request){
      // dd($request->all());
      DB::beginTransaction();
      try {
        //ubah status
          $recentStatusDo = DB::table('d_delivery_orderdt')
                              ->where('dod_do',$request->doId)
                              ->where('dod_detailid',$request->detailId)
                              ->first();
          // dd($recentStatusDo);
          if ($recentStatusDo->dod_status == "WT") {
              //update status to FN
              DB::table('d_delivery_orderdt')
                  ->where('dod_do',$request->doId)
                  ->where('dod_detailid',$request->detailId)
                  ->update(['dod_status' => "FN"]);
          }else{
              //update status to WT
              DB::table('d_delivery_orderdt')
                  ->where('dod_do',$request->doId)
                  ->where('dod_detailid',$request->detailId)
                  ->update(['dod_status' => "WT"]);
          }

          //get recent status Product Result detail
          //end status
          $doId = d_delivery_order::where('do_id',$request->doId)->first();
          $gc_sending = d_gudangcabang::select('gc_id')
                      ->where('gc_gudang','GUDANG SENDING')
                      ->first();
          //get stock item gdg Sending

          if(mutasi::mutasiStok(  $request->idItemMasuk,
                                  $request->qtyDiterima,
                                  $comp=$doId->do_send,
                                  $position=$gc_sending->gc_id,
                                  $flag='MENGURANGI',
                                  $request->noNotaMasuk,
                                  'MENGURANGI',
                                  Carbon::now(),
                                  100)){}

          //cek ada tidaknya record pada tabel
          $id_stock = DB::table('d_stock')->select('s_id')
              ->where('s_comp',$doId->do_send)
              ->where('s_position',$doId->do_send)
              ->where('s_item',$request->idItemMasuk)
              ->first();
          // dd($id_stock);
          if($id_stock != null){ //jika terdapat record, maka lakukan update
              //get stock item gdg Grosir
              $stok_item_gs = DB::table('d_stock')
              ->where('s_comp',$doId->do_send)
              ->where('s_position',$doId->do_send)
              ->where('s_item',$request->idItemMasuk)
              ->first();
              $stok_akhir_gdgGrosir = $stok_item_gs->s_qty + $request->qtyDiterima;
              //update stok gudang grosir
              $update = DB::table('d_stock')
                  ->where('s_comp',$doId->do_send)
                  ->where('s_position',$doId->do_send)
                  ->where('s_item',$request->idItemMasuk)
                  ->update(['s_qty' => $stok_akhir_gdgGrosir]);

              $sm_detailid = d_stock_mutation::select('sm_detailid')
                ->where('sm_stock',$id_stock->s_id)
                ->max('sm_detailid')+1;
                
              d_stock_mutation::create([
                    'sm_stock' => $id_stock->s_id,
                    'sm_detailid' => $sm_detailid,
                    'sm_date' => Carbon::now(),
                    'sm_comp' => $doId->do_send,
                    'sm_position' => $doId->do_send,
                    'sm_mutcat' => 9,
                    'sm_item' => $request->idItemMasuk,
                    'sm_qty' => $request->qtyDiterima,
                    'sm_qty_used' => 0,
                    'sm_qty_sisa' => $request->qtyDiterima,
                    'sm_qty_expired' => 0,
                    'sm_detail' => 'PENAMBAHAN',
                    'sm_reff' => $request->noNotaMasuk,
                    'sm_insert' => Carbon::now()
                ]);

          }else{ //jika tidak ada record, maka lakukan insert
              //get last id
              $id_stock = DB::table('d_stock')->max('s_id') + 1;
              //insert value ke tbl d_stock
              DB::table('d_stock')->insert([
                  's_id' => $id_stock,
                  's_comp' => $doId->do_send,
                  's_position' => $doId->do_send,
                  's_item' => $request->idItemMasuk,
                  's_qty' => $request->qtyDiterima,
              ]);

              d_stock_mutation::create([
                  'sm_stock' => $id_stock,
                  'sm_detailid' =>1,
                  'sm_date' => Carbon::now(),
                  'sm_comp' => $doId->do_send,
                  'sm_position' => $doId->do_send,
                  'sm_mutcat' => 9,
                  'sm_item' => $request->idItemMasuk,
                  'sm_qty' => $request->qtyDiterima,
                  'sm_qty_used' => 0,
                  'sm_qty_sisa' => $request->qtyDiterima,
                  'sm_qty_expired' => 0,
                  'sm_detail' => 'PENAMBAHAN',
                  'sm_reff' => $request->noNotaMasuk,
                  'sm_insert' => Carbon::now()
              ]);
          }
           
          //update d_delivery_orderdt
          $date = Carbon::parse($request->tglMasuk)->format('Y-m-d');
          $time = $request->jamMasuk.":00";
          $now = Carbon::now();
          DB::table('d_delivery_orderdt')
                  ->where('dod_detailid', $request->detailId)
                  ->where('dod_do',$request->doId)
                  ->update(['dod_qty_received' => $request->qtyDiterima, 'dod_date_received' => $date, 'dod_time_received' => $time, 'dod_update' => $now]);
                      
          DB::commit();
          return response()->json([
              'status' => 'Sukses',
              'pesan' => 'Data Telah Berhasil di Simpan'
          ]);
      }catch (\Exception $e) {
          DB::rollback();
          return response()->json([
              'status' => 'gagal',
              'data' => $e->getMessage()
          ]);
      }
    }

    public function get_penerimaan_by_tgl($tgl1,$tgl2,$akses,$comp)
    {
        // dd($akses);
        $y = substr($tgl1, -4);
        $m = substr($tgl1, -7,-5);
        $d = substr($tgl1,0,2);
        $tanggal1 = $y.'-'.$m.'-'.$d;

        $y2 = substr($tgl2, -4);
        $m2 = substr($tgl2, -7,-5);
        $d2 = substr($tgl2,0,2);
        $tanggal2 = $y2.'-'.$m2.'-'.$d2;
        //dd(array($tanggal1, $tanggal2));
        
        $query = d_delivery_orderdt::select(
                    'd_delivery_order.do_nota', 
                    'd_delivery_orderdt.dod_do',
                    'd_delivery_orderdt.dod_detailid',
                    'm_item.i_name',
                    'd_delivery_orderdt.dod_qty_send',
                    'd_delivery_orderdt.dod_qty_received',
                    'd_delivery_orderdt.dod_date_received',
                    'd_delivery_orderdt.dod_time_received',
                    'd_delivery_orderdt.dod_status')
            ->join('d_delivery_order', 'd_delivery_orderdt.dod_do', '=', 'd_delivery_order.do_id')
            ->join('m_item', 'd_delivery_orderdt.dod_item', '=', 'm_item.i_id')
            ->where('d_delivery_orderdt.dod_status', '=', 'FN')
            ->where('d_delivery_orderdt.dod_date_received','>=',$tanggal1)
            ->where('d_delivery_orderdt.dod_date_received','<=',$tanggal2)
            ->where('do_sendcomp',$comp)
            ->orderBy('d_delivery_orderdt.dod_update', 'desc')
            ->get();    
        if ($akses == "inventory") 
        {
            return DataTables::of($query)
            ->addIndexColumn()
            ->editColumn('tanggalTerima', function ($data) 
            {
                if ($data->dod_date_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
                }
            })
            ->editColumn('jamTerima', function ($data) 
            {
                if ($data->dod_time_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_time_received;
                }
            })
            ->editColumn('status', function ($data) 
            {
                if ($data->dod_status == "WT") 
                {
                    return '<span class="label label-info">Waiting</span>';
                }
                elseif ($data->dod_status == "FN") 
                {
                    return '<span class="label label-success">Final</span>';
                }
            })
            ->rawColumns(['status'])
            ->make(true);
        }
        else
        {
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($data)
            {
                if ($data->dod_qty_received == '0') 
                {
                    return '<div class="text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                    onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                                </a>
                            </div>';
                }
                else
                {
                    return '<div class="text-center">
                                <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                    onclick=ubahStatus("'.$data->dod_do.'","'.$data->dod_detailid.'")><i class="glyphicon glyphicon-ok"></i>
                                </a>
                            </div>';
                }     
            })
            ->editColumn('tanggalTerima', function ($data) 
            {
                if ($data->dod_date_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_date_received ? with(new Carbon($data->dod_date_received))->format('d M Y') : '';
                }
            })
            ->editColumn('jamTerima', function ($data) 
            {
                if ($data->dod_time_received == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->dod_time_received;
                }
            })
            ->editColumn('status', function ($data) 
            {
                if ($data->dod_status == "WT") 
                {
                    return '<span class="label label-info">Waiting</span>';
                }
                elseif ($data->dod_status == "FN") 
                {
                    return '<span class="label label-success">Final</span>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
        }
              
    }
}
