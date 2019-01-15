<?php

namespace App\Modules\Master\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\m_itemm;
use App\Modules\Master\model\d_formula_result;
use App\Modules\Master\model\d_formula;
use Carbon\Carbon;
use Response;
use Datatables;
use DB;

class MasterFormulaController extends Controller
{
  public function index(){

    $modalFormula=view('Master::MasterFormula.modal');
    return view('Master::MasterFormula.index',compact('modalFormula'));
  }

  public function table(){
  $data = d_formula_result::select( 'i_code',
                                'i_name',
                                'fr_result',
                                's_name',
                                'fr_id')
                ->join('m_item','i_id','=','fr_adonan')
                ->join('m_satuan','s_id','=','fr_scale')
                ->get();
                // dd($data);
    return DataTables::of($data)

    ->addColumn('formula', function ($data) {
    return '<div class="text-center">
            </div>';

    })

    ->addColumn('fr_result', function ($data) {
    return '<div class="text-right">
              '.(int)$data->fr_result.'
            </div>';

    })

    ->addColumn('action', function ($data) {
    return '<div class="text-center">
                  <button style="margin-left:5px;" 
                          title="Detail" 
                          type="button"
                          data-toggle="modal"
                          data-target="#myModalView"
                          onclick="lihatDetail('.$data->fr_id.')" 
                          class="btn btn-info fa fa-eye btn-sm"
                  </button>
                  <button style="margin-left:5px;" 
                          title="Edit" 
                          type="button"
                          data-toggle="modal" 
                          data-target="#myModalEdit"
                          class="btn btn-warning btn-sm" 
                          onclick="editFormula('.$data->fr_id.')">
                          <i class="fa fa-pencil"></i>
                  </button>
                  <button style="margin-left:5px;" 
                          type="button" 
                          onclick="distroyFormula('.$data->fr_id.')"
                          class="btn btn-danger btn-sm" 
                          title="Hapus">
                          <i class="fa fa-trash-o"></i>
                  </button>
            </div>';

    })

    ->rawColumns(['formula',
                  'action',
                  'fr_result'
    ])

    ->addIndexColumn()  

    ->make(true);
  }

  public function autocompFormula(Request $request){
    $term = $request->term;

    $results = array();
    
    $queries = m_itemm::where('m_item.i_name', 'LIKE', '%'.$term.'%')
      ->join('m_satuan','s_id','=','i_sat1')
      ->where('i_type','BB')
      ->where('i_active','Y')
      ->orderBy('i_name')
      ->take(15)->get();
    
    if ($queries == null) {
      $results[] = [ 'id' => null, 'label' =>'tidak di temukan data terkait'];
    } else {
      foreach ($queries as $query) 
      {
        $txtSat1 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat1)->first();
        $txtSat2 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat2)->first();
        $txtSat3 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat3)->first();

        $results[] = [  'id' => $query->i_id, 
                        'label' => $query->i_code .' - '.$query->i_name,
                        'name' => $query->i_name,
                        'id_satuan' => [$query->i_sat1],
                        'satuan' => [$txtSat1->s_name],
                        'i_code' => $query->i_code ];
      }
    } 

  return Response::json($results);
  }

  public function autocompNamaItem(Request $request){
    $term = $request->term;

    $results = array();
    
    $queries = m_itemm::where('m_item.i_name', 'LIKE', '%'.$term.'%')
      ->join('m_satuan','s_id','=','i_sat1')
      ->where('i_type','BP')
      ->where('i_active','Y')
      ->take(15)->get();
    
    if ($queries == null) {
      $results[] = [ 'id' => null, 'label' =>'tidak di temukan data terkait'];
    } else {
      foreach ($queries as $query) 
      {
        $txtSat1 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat1)->first();
        $txtSat2 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat2)->first();
        $txtSat3 = DB::table('m_satuan')->select('s_name', 's_id')->where('s_id','=', $query->i_sat3)->first();

        $results[] = [  'id' => $query->i_id, 
                        'label' => $query->i_code .' - '.$query->i_name,
                        'name' => $query->i_name,
                        'id_satuan' =>[$query->i_sat1],
                        'satuan' =>[$txtSat1->s_name] ];
      }
    } 

  return Response::json($results);   
  }

  public function saveFormula(Request $request){
    // dd($request->all());
    DB::beginTransaction();
          try { 
    $i_id = $request->i_id;
    $fr_id = d_formula_result::max('fr_id') + 1;
    d_formula_result::insert([
        'fr_id' => $fr_id,
        'fr_adonan' => $request->id_item,
        'fr_result' => $request->hasil_item,
        'fr_scale' => $request->satuanItem[0],
        'fr_created' => Carbon::now()
    ]);

    for ($i=0; $i < count($i_id) ; $i++) { 
      d_formula::insert([
        'f_id' => $fr_id,
        'f_detailid' =>$i + 1,
        'f_bb' => $i_id[$i],
        'f_value' => $request->qty[$i],
        'f_scale' =>$request->satuan[$i]
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

  public function distroyFormula(Request $request, $id){
    DB::beginTransaction();
          try {
    d_formula::where('f_id',$id)->delete();
    d_formula_result::where('fr_id',$id)->delete();
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

  public function viewFormula(Request $request){
    $data = d_formula_result::select( 'i_name',
                                      'fr_result',
                                      'fr_scale',
                                      's_name')
      ->join('m_item','i_id','=','fr_adonan')
      ->join('m_satuan','s_id','=','fr_scale')
      ->where('fr_id',$request->x)
      ->get();

    $formula = d_formula::select( 'i_name',
                                  'f_value',
                                  'f_scale',
                                  's_name')
      ->join('m_item','i_id','=','f_bb')
      ->join('m_satuan','s_id','=','f_scale')
      ->where('f_id',$request->x)
      ->get();

    
        return view('Master::MasterFormula.modal-formula',compact('data','formula'));
  }

  public function editFormula(Request $request){
    $data = d_formula_result::select( 'i_name',
                                      'i_id',
                                      'i_sat1',
                                      'i_sat2',
                                      'i_sat3',
                                      's_name',
                                      'fr_result',
                                      'fr_scale')
      ->join('m_item','i_id','=','fr_adonan')
      ->join('m_satuan','s_id','=','fr_scale')
      ->where('fr_id',$request->x)
      ->get();

    $formula = d_formula::select( 'i_name',
                                  'i_code',
                                  'i_id',
                                  's_name',
                                  'f_value',
                                  'f_scale')
      ->join('m_item','i_id','=','f_bb')
      ->join('m_satuan','s_id','=','f_scale')
      ->where('f_id',$request->x)
      ->get();

     return view('Master::MasterFormula.modal-edit',compact('data','formula'));
  }

  public function updateFormula(Request $request){
    // dd($request->all());
    DB::beginTransaction();
          try {
    $id_item = $request->id_item;
    $i_id    = $request->i_id;

    $fResult = d_formula_result::where('fr_adonan',$id_item)
      ->get();

    d_formula_result::where('fr_adonan',$id_item)
      ->update([
        'fr_result' => $request->hasil_item,
        'fr_scale'  => $request->satuanItem[0],
        'fr_updated' => Carbon::now()
      ]);

    d_formula::where('f_id',$fResult[0]->fr_id)->delete();

    for ($i=0; $i < count($request->i_id); $i++) { 
      d_formula::insert([
            'f_id' => $fResult[0]->fr_id,
            'f_detailid' => $i + 1,
            'f_bb' => $request->i_id[$i],
            'f_value' => $request->qty[$i],
            'f_scale' =>$request->satuan[$i]
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
