<?php

namespace App\Modules\Master\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;
use App\Suplier;
use Datatables;
use Session;

use App\m_supplier;

class SuplierController extends Controller
{

  public function __construct()
    {
        $this->middleware('auth');
    }

    public function suplier()
    {
        return view('Master::datasuplier/suplier');
    }

    public function tambah_suplier()
    {
      return view('Master::datasuplier/tambah_suplier');
    }

    public function suplier_proses(Request $request)
    {        
        //dd($request->all());
        DB::beginTransaction();
        try 
        {   
          $y = substr($request->tglTop, -4);
          $m = substr($request->tglTop, -7, -5);
          $d = substr($request->tglTop, 0, 2);
          $tglTop = $y.'-'.$m.'-'.$d;

          $m1 = DB::table('m_supplier')->max('s_id');
          $index = $m1+=1;
          $tanggal = date("Y-m-d h:i:s");

          DB::table('m_supplier')
            ->insert([
                's_id'=>$index,
                's_company'=>strtoupper($request->namaSup),
                's_name' => strtoupper($request->owner),
                's_npwp'=> $request->npwpSup,
                's_address'=> strtoupper($request->alamat),
                's_phone1'=>$request->noTelp1,
                's_phone2'=> $request->noTelp2,
                's_rekening'=> $request->rekening,
                's_bank'=> $request->methodBayar,
                's_fax'=>$request->fax,
                's_note'=> strtoupper($request->keterangan),
                's_top'=> $tglTop,
                's_limit'=>str_replace(',', '', $request->limit),
                's_insert'=>$tanggal
            ]);
        
            DB::commit();
            return response()->json([
              'status' => 'sukses',
              'pesan' => 'Data Master Supplier Berhasil Disimpan'
            ]);
        } 
        catch (\Exception $e) 
        {
          DB::rollback();
          return response()->json([
              'status' => 'gagal',
              'pesan' => $e->getMessage()."\n at file: ".$e->getFile()."\n line: ".$e->getLine()
          ]);
        }
    }

    public function datatable_suplier()
    {
      $data= DB::table('m_supplier')->get();
      $xyzab = collect($data);

      return Datatables::of($xyzab)
      ->addIndexColumn()
      ->editColumn('telp', function ($xyzab) {
        if ($xyzab->s_phone2 != null) 
        {
          return $xyzab->s_phone1.' | '.$xyzab->s_phone2;
        }else 
        {
          return $xyzab->s_phone1;
        }
      })
      ->editColumn('tglTop', function ($xyzab) 
      {
        if ($xyzab->s_top == null) 
        {
          return '-';
        }
        else 
        {
          return date("d-m-Y", strtotime($xyzab->s_top));
        }
      })
      ->addColumn('aksi', function ($xyzab) {
        return  '<div class="btn-group">'.
                 '<a href="suplier_edit/'.$xyzab->s_id.'" class="btn btn-warning btn-xs" title="edit">'.
                 '<label class="fa fa-pencil"></label></a>'.
                 '<a href="#" onclick=hapus("'.$xyzab->s_id.'") class="btn btn-danger btn-xs" title="hapus">'.
                 '<label class="fa fa-trash-o"></label></a>'.
                '</div>';
      })
      ->addColumn('hutang', function ($xyzab) {
        return  '<div style="float:left;">'.
                'Rp. '.
                '</div>'.
                '<div style="float:right;">'.number_format($xyzab->s_hutang,0,'','.').'</div>';
      })
      ->addColumn('limit', function ($xyzab) {
        return  '<div style="float:left;">'.
                'Rp. '.
                '</div>'.
                '<div style="float:right;">'.number_format($xyzab->s_limit,0,'','.').'</div>';
      })

      ->rawColumns(['aksi', 'limit', 'hutang'])
      ->make(true);
    }

    public function suplier_edit($s_id)
    {   
      $edit_suplier = DB::table("m_supplier")->where("s_id", $s_id)->first();
      // return json_encode($edit_suplier); 
      json_encode($edit_suplier);
      return view('Master::datasuplier/edit_suplier', ['edit_suplier' => $edit_suplier] , compact('edit_suplier', 's_id'));
    }

    public function suplier_edit_proses(Request $request)
    {
        //dd($request->all());
        DB::beginTransaction();
        try 
        { 
          if ($request->tglTop != "") {
            $tglTop = date('Y-m-d',strtotime($request->tglTop));
          }else{
            $tglTop = null;
          }
          

          $tanggal = date("Y-m-d h:i:s");

          DB::table('m_supplier')
            ->where('s_id',$request->get('s_idx'))
            ->update([
                's_company'=>strtoupper($request->perusahaan),
                's_name' => strtoupper($request->nama),
                's_npwp'=> $request->npwpSup,
                's_address'=> strtoupper($request->alamat),
                's_phone1'=>$request->noHp1,
                's_phone2'=> $request->noHp2,
                's_rekening'=> $request->rekening,
                's_bank'=> $request->methodBayar,
                's_fax'=>$request->email,
                's_note'=> strtoupper($request->keterangan),
                's_top'=> $tglTop,
                's_limit'=>str_replace(',', '', $request->limit),
                's_update'=>$tanggal
            ]);
        
            DB::commit();
            return response()->json([
              'status' => 'sukses',
              'pesan' => 'Data Master Supplier Berhasil Diupdate'
            ]);
        } 
        catch (\Exception $e) 
        {
          DB::rollback();
          return response()->json([
              'status' => 'gagal',
              'pesan' => $e->getMessage()."\n at file: ".$e->getFile()."\n line: ".$e->getLine()
          ]);
        }  
    }

    public function suplier_hapus(Request $request)
    {
      $type = DB::Table('m_supplier')->where('s_id','=',$request->id)->delete();
      return response()->json([
                'status' => 'sukses',
                'pesan' => 'Data Suppler Berhasil Dihapus'
            ]);
    } 

    public function find_m_suplier(Request $req) {
      // Keyword yang diberikan oleh user
      $keyword = $req->keyword;  
      $keyword = $keyword != null ? $keyword : '';

      if($keyword == '') {
          $data = m_supplier::all();
      }
      else {
          $data = m_supplier::where('s_company', 'LIKE', "%$keyword%")->get();
      }
      $res = array('data' => $data);

      return response()->json($res);
    }
}
