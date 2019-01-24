<?php

namespace App\Modules\Master\Controllers;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use Illuminate\Http\Request;
use Datatables;
use URL;
use App\m_jabatan_pro;
use App\Jabatan;

class JabatanController extends Controller
{
    public function index()
    {
        $jabatanPro = view('Master::datajabatan.jabatan-produksi');

        return view('Master::datajabatan.datajabatan',compact('jabatanPro'));
    }

    public function jabatanData(){
         $list = DB::table('m_jabatan')
                 ->join('m_divisi', 'm_divisi.c_id', '=', 'm_jabatan.c_divisi_id')
                 ->select('m_jabatan.*', 'm_divisi.c_divisi')
                 ->get();
         $data = collect($list);
         return Datatables::of($data)           
                 ->addColumn('action', function ($data) {
                     if ($data->c_isactive == 'TRUE') {
                         return  '<div class="text-center">'.
                                     '<button id="edit" 
                                         onclick="edit('.$data->c_id.')" 
                                         class="btn btn-warning btn-sm" 
                                         title="Edit">
                                         <i class="glyphicon glyphicon-pencil"></i>
                                     </button>'.'
                                     <button id="status'.$data->c_id.'" 
                                         onclick="ubahStatusMan('.$data->c_id.')" 
                                         class="btn btn-primary btn-sm" 
                                         title="Aktif">
                                         <i class="fa fa-check-square" aria-hidden="true"></i>
                                     </button>'.'
                                 </div>';
                     }
                     else
                     {
                         return  '<div class="text-center">'.
                                     '<button id="status'.$data->c_id.'" 
                                         onclick="ubahStatusMan('.$data->c_id.')" 
                                         class="btn btn-danger btn-sm" 
                                         title="Tidak Aktif">
                                         <i class="fa fa-minus-square" aria-hidden="true"></i>
                                     </button>'.
                                 '</div>';
                     }
                     
                 })
                 ->addColumn('kode', function ($data) {
                     return  str_pad($data->c_id, 3, '0', STR_PAD_LEFT);
                 })
                 ->addColumn('none', function ($data) {
                     return '-';
                 })
                 ->rawColumns(['action','view','posisi'])
                 ->make(true);
     }
     public function getPegawai(Request $request, $id){
         $maxid = DB::Table('m_pegawai')->select('c_id_by_production')->where('c_jabatan_id', $id)->max('c_id_by_production');
         // untuk +1 nilai yang ada,, jika kosong maka maxid = 1 , 
         if ($maxid <= 0 || $maxid <= '') {
             $maxid  = 1;
         }else{
             $maxid += 1;
         }
         // $kd_produksi = Request::segment(4);
         $kd_jabatan = $request->segment(5);
         if($kd_jabatan == "7"){
             $kode = "4"."-".str_pad($id, 2, '0', STR_PAD_LEFT).$pro."-".str_pad($maxid, 3, '0', STR_PAD_LEFT);
         }else{
             $kode = "4"."-".str_pad($id, 2, '0', STR_PAD_LEFT)."-".str_pad($maxid, 3, '0', STR_PAD_LEFT);
         }
         // dd($kode);
         $shift = DB::table('m_shift')->get();
         return view('master/datajabatan/pegawai', ['kode' => $kode, 'shift' => $shift]);
     }
     public function pegawaiData($id){
         $list = DB::table('m_pegawai')
                 ->select('m_pegawai.*', 'm_jabatan.c_posisi')
                 ->join('m_jabatan', 'm_pegawai.c_jabatan_id', '=', 'm_jabatan.c_id')
                 ->where('c_jabatan_id', $id)
                 ->get();
         $data = collect($list);
         return Datatables::of($data)           
                 ->addColumn('action', function ($data) {
                          return  '<button id="edit" onclick="edit('.$data->c_id.')" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button>'.'
                                         <button id="delete" onclick="hapus('.$data->c_id.')" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
                 })
                 ->addColumn('kode', function ($data) {
                     return  str_pad($data->c_id, 3, '0', STR_PAD_LEFT);
                 })
                 ->addColumn('none', function ($data) {
                     return '-';
                 })
                 ->rawColumns(['action','confirmed'])
                 ->make(true);
     }
     public function tambahJabatan(Request $request)
     {
         $divisi = DB::table('m_divisi')->where('c_isactive','TRUE')->get();
         $subdivisi = DB::table('m_sub_divisi')->where('c_isactive','TRUE')->get();

         return view('Master::datajabatan.tambah_jabatan', ['divisi' => $divisi, 'subdivisi' => $subdivisi]);
     }
     public function simpanJabatan(Request $request){
         $input = $request->all();
         // dd($input);
         $data = Jabatan::create($input);
         return redirect('master/datajabatan');
     }
     public function editJabatan($id){
         $jabatan = DB::table('m_jabatan')->where('c_id', $id)->first();
         $divisi = DB::table('m_divisi')->get();
         $subdivisi = DB::table('m_sub_divisi')->get();
         // dd($jabatan);
         return view('Master::datajabatan.edit_jabatan', ['jabatan' => $jabatan, 'divisi' => $divisi, 'subdivisi' => $subdivisi]);
     }
     public function updateJabatan(Request $request, $id){
         // return $id;
 
         $input = $request->except('_token', '_method');
         $data = Jabatan::where('c_id', $id)->update($input);
         return redirect('/master/datajabatan');
     }
     public function deleteJabatan($id){
         // return $id;
         DB::beginTransaction();
         try {
         $data = DB::table('m_jabatan')->where('c_id', $id)->delete();
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
 
         // return redirect('master/datajabatan');
     }
 
     public function tablePro(){
         $produksi = m_jabatan_pro::all();
         // dd($produksi);
         return Datatables::of($produksi) 
         ->addIndexColumn()
         ->addColumn('action', function ($data) {
             if ($data->c_isactive == 'TRUE') 
             {
                 return '<div class="text-center">'.
                             '<button id="edit" 
                                 onclick="editJPro('.$data->c_id.')" 
                                 class="btn btn-warning  btn-sm" 
                                 title="Edit"><i class="glyphicon glyphicon-pencil"></i>
                             </button>'.'
                             <button id="status'.$data->c_id.'" 
                                 onclick="ubahStatusPro('.$data->c_id.')" 
                                 class="btn btn-primary btn-sm" 
                                 title="Aktif">
                                 <i class="fa fa-check-square" aria-hidden="true"></i>
                             </button>'.'
                         </div>';
             }
             else
             {
                 return '<div class="text-center">'.
                             '<button id="status'.$data->c_id.'" 
                                 onclick="ubahStatusPro('.$data->c_id.')" 
                                 class="btn btn-danger btn-sm" 
                                 title="Tidak Aktif">
                                 <i class="fa fa-minus-square" aria-hidden="true"></i>
                             </button>'.'
                         </div>';
             }
         })
 
         ->rawColumns(['action'])
         ->make(true);
     }
 
     public function tambahJabatanPro()
     {
 
         return view('Master::datajabatan.tambah-jabatanpro');
     }
 
     public function simpanJabatanPro(Request $req){
         //dd($req->all());
         DB::beginTransaction();
         try {
         $id = m_jabatan_pro::select('c_id')->max('c_id')+1;
         m_jabatan_pro::insert([
             'c_id' => $id,
             'c_jabatan_pro' => $req->c_jabatan_pro,
             'created_at' => Carbon::now()
         ]);
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
 
     public function hapusJabatanPro($id){
         DB::beginTransaction();
         try {
             m_jabatan_pro::where('c_id',$id)->delete();
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
 
     public function editPro($id)
     {
         $jPro = m_jabatan_pro::where('c_id',$id)
             ->first();
 
         return view('Master::datajabatan.edit_jabatan_pro',compact('jPro'));
     }
 
     public function updatePro(Request $request, $id)
     {
        m_jabatan_pro::where('c_id',$id)
             ->update([
                 'c_jabatan_pro' => $request->c_posisi
             ]);
 
        return redirect('master/datajabatan');
     }
 
     public function ubahStatusMan(Request $request)
     {
         DB::beginTransaction();
         try {
         $cek = m_jabatan::select('c_isactive')
             ->where('c_id',$request->id)
             ->first();
 
        if ($cek->c_isactive == 'TRUE') 
        {
            m_jabatan::where('c_id',$request->id)
                ->update([
                     'c_isactive' => 'FALSE'
                ]);       
        } 
        else
        {
            m_jabatan::where('c_id',$request->id)
                ->update([
                     'c_isactive' => 'TRUE'
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
 
     public function ubahStatusPro(Request $request)
     {
         DB::beginTransaction();
         try {
         $cek = m_jabatan_pro::select('c_isactive')
             ->where('c_id',$request->id)
             ->first();
         if ($cek->c_isactive == 'TRUE') 
         {
             m_jabatan_pro::where('c_id',$request->id)
             ->update([
                 'c_isactive' => 'FALSE'
             ]);
         }
         else
         {
             m_jabatan_pro::where('c_id',$request->id)
             ->update([
                 'c_isactive' => 'TRUE'
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
