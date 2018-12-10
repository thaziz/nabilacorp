<?php

namespace App\Modules\Produksi\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Datatables;
use App\d_spk;
use App\d_productplan;
use App\d_productresult;
use App\d_productresult_dt;
use App\d_gudangcabang;
use Response;
use Carbon\Carbon;
use App\d_stock;
use App\d_stock_mutation;

class ManOutputProduksiController extends Controller
{
    public function index(){
    	$modalCreate = view('Produksi::o_produksi.modal-create');
    	return view('Produksi::o_produksi.index',compact('modalCreate')); 
    }

    public function tabel($tgl1, $tgl2){
        $y = substr($tgl1, -4);
        $m = substr($tgl1, -7,-5);
        $d = substr($tgl1,0,2);
         $tanggal1 = $y.'-'.$m.'-'.$d;

        $y2 = substr($tgl2, -4);
        $m2 = substr($tgl2, -7,-5);
        $d2 = substr($tgl2,0,2);
          $tanggal2 = $y2.'-'.$m2.'-'.$d2;
        //   dd($tgl01);
        $data = d_spk::join('m_item', 'spk_item', '=', 'i_id')
            ->join('d_productplan', 'pp_id', '=', 'spk_ref')
            ->select('spk_id', 'spk_date', 'i_code', 'i_name', 'pp_qty', 'spk_code', 'spk_status')
            ->where(function ($query) {
                $query->where('spk_status', 'PB');
            })
            ->where('spk_date', '>=', $tanggal1)
            ->where('spk_date', '<=', $tanggal2)
            ->orderBy('spk_date', 'DESC')

            ->get();
        return DataTables::of($data)

            ->editColumn('spk_date', function ($user) {
                return $user->spk_date ? with(new Carbon($user->spk_date))->format('d M Y') : '';

            })

            ->editColumn('item', function ($user) {
                return ($user->i_code .' - '. $user->i_name);
            })

            ->editColumn('produksi', function ($user) {
                return $result = d_productresult_dt::
                    join('d_productresult','d_productresult.pr_id','=','prdt_productresult')
                    ->where('pr_spk',$user->spk_id)
                    ->sum('d_productresult_dt.prdt_qty');
            })

            ->editColumn('result', function ($user) {
                return '<input type="number" name="" class="form-control input-sm">';
            })

            ->addColumn('action', function ($data) {
                    return '<div class="text-center">
                  <button style="margin-left:5px;" 
                          title="Menunggu" 
                          type="button"
                          class="btn btn-success btn-sm">
                          <i class="fa fa-info-circle" aria-hidden="true"></i>
                  </button>
                </div>';

            })

            ->rawColumns(['prdt_status',
                          'produksi',
                          'result',
                          'action'
            ])
            ->make(true);

    }

    public function setSpk($tgl1, $comp)
    {
        $y = substr($tgl1, -4);
        $m = substr($tgl1, -7, -5);
        $d = substr($tgl1, 0, 2);
        $tgll = $y . '-' . $m . '-' . $d;
        $dataSpk = DB::table('d_spk')
            ->join('m_item', 'm_item.i_id', '=', 'd_spk.spk_item')
            ->join('d_productplan', 'd_productplan.pp_id', '=', 'd_spk.spk_ref')
            ->where('spk_status', 'PB')
            ->where('spk_date', '=', $tgll)
            ->where('spk_comp',$comp)
            ->get();

        $html = '<select id="cari_spk" onchange="setResultSpk()" class="form-control input-sm" style="width: 100%;">';
        $html .= '<option value="0">- Pilih Nomor SPK</option>';
        foreach ($dataSpk as $key => $spk) {
            $html .= '<option value=' . $spk->spk_id . '>' . $spk->spk_code . '</option>';
        }
        $html .= '</select>';

        return $html;
    }

    public function selectDataSpk($x)
    {
        $d_spk = d_spk::
        select('spk_id',
            'i_name',
            'i_id',
            'pp_qty',
            DB::raw("sum(prdt_qty) as prdt_qty"))
            ->join('m_item', 'm_item.i_id', '=', 'd_spk.spk_item')
            ->join('d_productplan', 'd_productplan.pp_id', '=', 'd_spk.spk_ref')
            ->leftJoin('d_productresult', 'd_productresult.pr_spk', '=', 'd_spk.spk_id')
            ->leftJoin('d_productresult_dt', 'd_productresult_dt.prdt_productresult', '=', 'd_productresult.pr_id')
            ->where('spk_id', '=', $x)
            ->get();

        return Response::json($d_spk);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            $cek = DB::table('d_productresult')
                ->where('pr_spk', $request->spk_id)
                ->get();
            $status = d_spk::where('spk_id', $request->spk_id)
                ->first();

            d_productplan::where('pp_id', $status->spk_ref)
                ->update([
                    'pp_isspk' => 'P'
                ]);

            $nota = d_spk::select('spk_code')
                ->where('spk_id', $request->spk_id)
                ->first();

            $maxid1 = DB::Table('d_productresult_dt')->select('prdt_detail')->max('prdt_detail');
            if ($maxid1 <= 0 || $maxid1 == '') {
                $maxid1 = 1;
            } else {
                $maxid1 += 1;
            }

            $maxid = DB::Table('d_productresult')->select('pr_id')->max('pr_id');
            if ($maxid <= 0 || $maxid == '') {
                $maxid = 1;
            } else {
                $maxid += 1;
            }

            if (count($cek) == 0) {

                d_productresult::insert([
                    'pr_id' => $maxid,
                    'pr_spk' => $request->spk_id,
                    'pr_date' => Carbon::now(),
                    'pr_item' => $request->spk_item
                ]);

                d_productresult_dt::insert([
                    'prdt_productresult' => $maxid,
                    'prdt_detail' => $maxid1,
                    'prdt_item' => $request->spk_item,
                    'prdt_qty' => $request->spk_qty,
                    'prdt_sisa' => $request->spk_qty,
                    'prdt_produksi' => $request->prdt_produksi,
                    'prdt_status' => 'RD',
                    'prdt_date' => Carbon::now(),
                    'prdt_time' => $request->time

                ]);

            } else {

                $pr = d_productresult::where('pr_spk', $request->spk_id)
                    ->get();

                $prdt = d_productresult_dt::where('prdt_productresult', $pr[0]->pr_id)
                    ->where('prdt_status', 'RD')
                    ->first();

                if ($prdt != null) {

                    $hasil = $prdt->prdt_qty + $request->spk_qty;
                    $sisa = $prdt->prdt_sisa + $request->spk_qty;

                    d_productresult_dt::where('prdt_productresult', $pr[0]->pr_id)
                        ->where('prdt_status', 'RD')
                        ->update([
                            'prdt_qty' => $hasil,
                            'prdt_sisa' => $sisa,
                        ]);

                } else {

                    d_productresult_dt::insert([
                        'prdt_productresult' => $pr[0]->pr_id,
                        'prdt_detail' => $maxid1,
                        'prdt_item' => $request->spk_item,
                        'prdt_qty' => $request->spk_qty,
                        'prdt_produksi' => $request->prdt_produksi,
                        'prdt_status' => 'RD',
                        'prdt_date' => Carbon::now(),
                        'prdt_time' => $request->time

                    ]);
                }

            }
            // dd($status);
            $gc_id = d_gudangcabang::select('gc_id')
	          ->where('gc_gudang','GUDANG PRODUKSI')
	          ->where('gc_comp',$status->spk_comp)
	          ->first();
	        $gudang = $gc_id->gc_id;

            $stockProduksi = d_stock::where('s_comp', $gudang)
                ->where('s_position', $gudang)
                ->where('s_item', $request->spk_item)
                ->first();

            if ($stockProduksi == null) {
                $maxid = DB::Table('d_stock')->select('s_id')->max('s_id');
                if ($maxid <= 0 || $maxid == '') {
                    $maxid = 1;
                } else {
                    $maxid += 1;
                }

                d_stock::insert([
                    's_id' => $maxid,
                    's_comp' => $gudang,
                    's_position' => $gudang,
                    's_item' => $request->spk_item,
                    's_qty' => $request->spk_qty,
                    's_insert' => Carbon::now()
                ]);

                d_stock_mutation::create([
                    'sm_stock' => $maxid,
                    'sm_detailid' => 1,
                    'sm_date' => Carbon::now(),
                    'sm_comp' => $gudang,
                    'sm_position' => $gudang,
                    'sm_mutcat' => 5,
                    'sm_item' => $request->spk_item,
                    'sm_qty' => $request->spk_qty,
                    'sm_qty_used' => 0,
                    'sm_qty_sisa' => $request->spk_qty,
                    'sm_qty_expired' => 0,
                    'sm_detail' => 'PENAMBAHAN',
                    'sm_reff' => $nota->spk_code,
                    'sm_insert' => Carbon::now()
                ]);

            } else {

                $sm_detailid = d_stock_mutation::select('sm_detailid')
                        ->where('sm_item', $request->spk_item)
                        ->where('sm_comp', $gudang)
                        ->where('sm_position', $gudang)
                        ->max('sm_detailid') + 1;

                $stokBaru = $stockProduksi->s_qty + $request->spk_qty;
                $stokProduksi = d_stock::where('s_comp', $gudang)
                    ->where('s_position', $gudang)
                    ->where('s_id', $stockProduksi->s_id)
                    ->update(['s_qty' => $stokBaru]);

                d_stock_mutation::create([
                    'sm_stock' => $stockProduksi->s_id,
                    'sm_detailid' => $sm_detailid,
                    'sm_date' => Carbon::now(),
                    'sm_comp' => $gudang,
                    'sm_position' => $gudang,
                    'sm_mutcat' => 5,
                    'sm_item' => $request->spk_item,
                    'sm_qty' => $request->spk_qty,
                    'sm_qty_used' => 0,
                    'sm_qty_sisa' => $request->spk_qty,
                    'sm_qty_expired' => 0,
                    'sm_detail' => 'PENAMBAHAN',
                    'sm_reff' => $nota->spk_code,
                    'sm_insert' => Carbon::now()
                ]);

            }

            $cek = d_productresult::select(
                'pr_id',
                'pr_spk',
                'prdt_qty')
                ->where('pr_spk',$request->spk_id)
                ->join('d_productresult_dt','d_productresult_dt.prdt_productresult','=','pr_id')
                ->get();
            
            $totalHasil = 0;
            for ($i=0; $i <count($cek) ; $i++) { 
                
                $totalHasil += $cek[$i]->prdt_qty;
            }

            $autoStatus = d_spk::select('spk_id',
                'spk_ref',
                'spk_status',
                'pp_qty')
                ->where('spk_id',$request->spk_id)
                ->join('d_productplan','d_productplan.pp_id','=','spk_ref')
                ->first();
           // dd($totalHasil);
            if ($autoStatus->pp_qty == $totalHasil) {
                $autoStatus->update([
                    'spk_status' => 'FN'
                ]);
                d_productplan::where('pp_id', $status->spk_ref)
                ->update([
                    'pp_isspk' => 'C'
                ]);
            }


        DB::commit();
	    return response()->json([
	          'status' => 'sukses'
	      ]);
	    } catch (\Exception $e) {
	    DB::rollback();
	    return response()->json([
	        'status' => 'gagal',
	        'data' => $e
	      ]);
	    }
    }
}
