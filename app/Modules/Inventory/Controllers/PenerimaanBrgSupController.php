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
      $ssss = Session::get('user_comp') ;
      return view('Inventory::p_suplier.index',compact('tabIndex','tabWait','tabFinish','tabModal','tabModDetail','tabDetItem','ssss'));
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
            $purchase = DB::table('d_purchaseorder_dt')
            ->select('d_purchaseorder_dt.podt_purchaseorder', 'd_purchase_order.po_id')
            ->join('d_purchase_order', 'd_purchaseorder_dt.podt_purchaseorder', '=', 'd_purchase_order.po_id')
            // ->where('d_purchaseorder_dt.d_pcsdt_isreceived','=','FALSE')
            ->where('d_purchase_order.po_code', 'LIKE', '%'.$term.'%')
            ->where('d_purchaseorder_dt.podt_isconfirm','=','TRUE')
            ->orderBy('d_purchase_order.po_code', 'DESC')
            ->limit(5)
            ->groupBy('po_code')->get();

            foreach ($purchase as $val) 
            {
                $formatted_tags[] = ['id' => $val->d_pcs_id, 'text' => $val->d_pcs_code];
            }

          return Response::json($formatted_tags);  
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
        
        // $query = DB::table('d_purchase_order')
        // ->select('d_tb_code','d_tb_duedate','po_id','po_comp','po_date','po_code','po_supplier','s_company','po_mem','m_name','d_tb_status')
        // ->join('d_mem','d_purchase_order.po_mem','=','d_mem.m_id')
        // ->join('m_supplier','d_purchase_order.po_supplier','=','m_supplier.s_id')
        // ->leftjoin('d_terima_pembelian','d_purchase_order.po_code','=','d_terima_pembelian.d_tb_noreff')
        // ->where('po_comp',$comp)
        // ->get();

        $query = DB::table('d_terima_pembelian')
                ->join('d_mem','d_terima_pembelian.d_tb_staff','=','d_mem.m_id')
                ->join('m_supplier','d_terima_pembelian.d_tb_sup','=','m_supplier.s_id')
                ->leftjoin('d_purchase_order','d_purchase_order.po_code','=','d_terima_pembelian.d_tb_noreff')
                ->where('po_comp',$comp)
                ->get();
        // return $query;   
     
            return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function($data)
            {
                return '<div class="text-center">
                            <a class="btn btn-sm btn-success" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->po_id.'")><i class="fa fa-eye"></i>
                            </a>
                             <a class="btn btn-sm btn-info" href="javascript:void(0)" title="Ubah Status"
                                onclick=ubahStatus("'.$data->po_id.'")><i class="fa fa-pencil"></i>
                            </a>
                        </div>
                        ';
                    
            })
            ->editColumn('tanggalTerima', function ($data) 
            {
                if ($data->d_tb_duedate == null) 
                {
                    return '-';
                }
                else 
                {
                    return $data->d_tb_duedate ? with(new Carbon($data->d_tb_duedate))->format('d M Y') : '';
                }
            })
            ->editColumn('status', function ($data) 
            {
                if ($data->d_tb_status == "WT") 
                {
                    return '<span class="label label-info">Waiting</span>';
                }
                elseif ($data->d_tb_status == "FN") 
                {
                    return '<span class="label label-success">Final</span>';
                }
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
        
              
    }
}
