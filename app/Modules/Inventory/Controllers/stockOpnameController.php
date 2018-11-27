<?php

namespace App\Modules\Inventory\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\d_gudangcabang;
use App\d_stock;
use App\m_itemm;
use DB;
use Response;
use Session;
use App\d_opname;
use App\d_opnamedt;
use App\d_stock_mutation;
use App\lib\mutasi;
use Carbon\Carbon;

class stockOpnameController extends Controller
{
    public function index(){
    	$cabang=Session::get('user_comp');                
        $dataGudang = DB::table('d_gudangcabang')
                      ->where('gc_comp',$cabang)
                      ->select('gc_id','gc_gudang')->get();
    	$daftar = view('Inventory::stockopname.daftar',compact('dataGudang'));
    	return view('Inventory::stockopname.index',compact('daftar'));
    }

    public function tableOpname(Request $request, $comp)
    {
      $term = $request->term;
      $results = array();
      $queries = m_itemm::
        select('i_id',
               'i_code',
               'i_name',
               's_name',
               's_qty')
        ->where('m_item.i_name', 'LIKE', '%'.$term.'%')
        ->where('i_isactive','TRUE')
        ->leftJoin('d_stock',function($join)use($comp){
        	$join->on('i_id','=','s_item');
        	$join->on('s_comp','=',DB::raw($comp));
        	$join->on('s_position','=',DB::raw($comp));
        })
        ->leftJoin('m_satuan','m_satuan.s_id','=','i_sat1')
        ->take(15)->get();
      if ($queries == null) {
        $results[] = [ 'id' => null, 'label' =>'tidak di temukan data terkait'];
      } else {
        foreach ($queries as $query)
        {
          $results[] = [  'id' => $query->i_id,
                          'label' => $query->i_code .' - '.$query->i_name,
                          'i_code' => $query->i_code,
                          'i_name' => $query->i_name,
                          's_qtykw' => number_format($query->s_qty,0,',','.'),
                          's_qty' => $query->s_qty,
                          'm_sname' => $query->s_name,
                      ];
        }
      }

    return Response::json($results);

    }

    public function saveOpname(Request $request){
      DB::beginTransaction();
    	try {
      $o_id = d_opname::max('o_id') + 1;
      //nota
      $year = carbon::now()->format('y');
      $month = carbon::now()->format('m');
      $date = carbon::now()->format('d');
      $nota = 'OD'  . $year . $month . $date . $o_id;
      $total_opname = 0;
      $akun_first = [];
      $err = true;
      //end Nota
      d_opname::insert([
          'o_id' => $o_id,
          'o_nota' => $nota,
          // 'o_staff' => $request->o_staff,
          'o_comp' => $request->o_comp,
          'o_position' => $request->o_comp,
          'o_insert' => Carbon::now()
      ]);

      for ($i=0; $i < count($request->i_id); $i++) {
      	d_opnamedt::insert([
            'od_ido' => $o_id,
            'od_idodt' => $i+1,
            'od_item' => $request->i_id[$i],
            'od_opname' => $request->opname[$i]
          ]);
      	$cek = d_stock::select('s_id','s_qty')
                ->where('s_item', $request->i_id[$i])
                ->where('s_comp', $request->o_comp)
                ->where('s_position', $request->o_comp)
                ->first();
        $hasil = $cek->s_qty + $request->opname[$i];
        $sm_detailid = d_stock_mutation::select('sm_detailid')
            ->where('sm_item', $request->i_id[$i])
            ->where('sm_comp', $request->o_comp)
            ->where('sm_position', $request->o_comp)
            ->max('sm_detailid')+1;
        // dd($sm_detailid);
        if ( $request->opname[$i] <= 0) {//+
            if(mutasi::mutasiStok(  $request->i_id[$i],
                                    - $request->opname[$i],
                                    $comp=$request->o_comp,
                                    $position=$request->o_comp,
                                    $flag='MENGURANGI OPNAME',
                                    $nota,
                                    '',
                                    date('Y-m-d'),
                                    70
                                	)){}
          } else {//-
            $cek->update([
              's_qty' => $hasil
            ]);

            d_stock_mutation::create([
              'sm_stock' => $cek->s_id,
              'sm_detailid' => $sm_detailid,
              'sm_date' => Carbon::now(),
              'sm_comp' => $request->o_comp,
              'sm_position' => $request->o_comp,
              'sm_mutcat' => 60,
              'sm_item' => $request->i_id[$i],
              'sm_qty' => $request->opname[$i],
              'sm_qty_used' => 0,
              'sm_qty_sisa' => $request->opname[$i],
              'sm_qty_expired' => 0,
              'sm_detail' => 'PENAMBAHAN',
              'sm_reff' => $nota,
              'sm_insert' => Carbon::now()
            ]);
          }
      	}
      	$nota = d_opname::where('o_id',$o_id)
          ->first();
        DB::commit();
	    return response()->json([
	          'status' => 'sukses',
	          'nota' => $nota
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
