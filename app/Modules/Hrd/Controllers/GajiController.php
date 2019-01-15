<?php

namespace App\Modules\Hrd\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Datatables;
use URL;
use Carbon\Carbon;
use DB;
use Response;
use App\Http\Requests;
use App\GajiManajemen;
use App\GajiProduksi;
use App\Potongan;
use App\m_gaji_pro;
use App\Model\Master\m_tunjangan_man;

class GajiController extends Controller
{
    public function settingGajiMan()
    {

        return view('Hrd::payroll.index');
    }
    public function gajiManData(){
        $list = DB::table('m_gaji_man')
                ->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                         return  '<div class="text-center">
                                    <button id="edit" 
                                        onclick="edit('.$data->c_id.')" 
                                        class="btn btn-warning btn-sm" title="Edit">
                                    <i class="glyphicon glyphicon-pencil"></i></button>'.'
                                        <button id="delete" 
                                        onclick="hapus('.$data->c_id.')" 
                                        class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </div>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addColumn('sma', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( floatval($data->c_sma) ,2,',','.').'
                      </span>
                    </div>';
                })
                ->addColumn('d3', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( floatval($data->c_d3) ,2,',','.').'
                      </span>
                    </div>';
                })
                ->addColumn('s1', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( floatval($data->c_s1) ,2,',','.').'
                      </span>
                    </div>';
                })
                ->addColumn('pangkat', function ($data) {
                    if($data->c_jabatan == 1){
                        $pangkat = "Leader";
                    }elseif($data->c_jabatan == 2){
                        $pangkat = "Staf";
                    }else{
                        $pangkat = "Semua";
                    }
                    return $pangkat;
                })
                ->rawColumns(['action','sma','d3','s1'])
                ->make(true);
    }
    public function gajiProData(){
        $list = DB::table('m_gaji_pro')
            ->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                         return  '<div class="text-center">
                                    <button id="edit" 
                                        onclick="editPro('.$data->c_id.')" 
                                        class="btn btn-warning btn-sm" 
                                        title="Edit">
                                        <i class="glyphicon glyphicon-pencil"></i>
                                    </button>'.'
                                    <button id="delete" 
                                        onclick="hapusPro('.$data->c_id.')" 
                                        class="btn btn-danger btn-sm" 
                                        title="Hapus">
                                        <i class="glyphicon glyphicon-trash"></i>
                                    </button>
                                </div>';
                })
                ->addColumn('lembur', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( $data->c_lembur ,2,',','.').'
                      </span>
                    </div>';
                })
                ->addColumn('c_status', function ($data) {
                    if ($data->c_status == 'GR') {
                        return '<div>
                                    Garapan
                                </div>';
                    }else{
                        return '<div>
                                    Absensi
                                </div>';
                    }
                    
                })
                ->addColumn('jabatan', function ($data) {
                    if ($data->c_gaji_jabatan != null) 
                    {
                        $t_list = explode(',', $data->c_gaji_jabatan);

                        $aaa = '<ul style="list-style-type:square">';
                        for ($i=0; $i <count($t_list); $i++) 
                        { 
                            $txt = DB::table('m_jabatan_pro')->select('c_jabatan_pro')
                                ->where('c_id', $t_list[$i])->first();
                            $aaa .=  '<li>'.$txt->c_jabatan_pro.'</li>';
                        }
                        $aaa .= '</ul>';
                        return $aaa;
                    }
                    else
                    {
                        return '-';
                    };
                })
                ->addColumn('gaji', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( $data->c_gaji ,2,',','.').'
                      </span>
                    </div>';
                })
                ->rawColumns(['action','lembur','jabatan','gaji','c_status'])
                ->make(true);
    }
    public function potonganData(){
        $list = DB::table('m_potongan')
                ->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                         return  '<button id="edit" onclick="editPot('.$data->c_id.')" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button>'.'
                                        <button id="delete" onclick="hapusPot('.$data->c_id.')" class="btn btn-danger btn-sm" title="Hapus"><i class="glyphicon glyphicon-trash"></i></button>';
                })
                ->rawColumns(['action'])
                ->make(true);
    }
    public function tambahGajiMan()
    {
        return view('Hrd::payroll/tambah_set_manajemen');
    }
    public function simpanGajiMan(Request $request){
        $input = $request->all();
        $data = GajiManajemen::create($input);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function editGajiMan($id)
    {
        $data = DB::table('m_gaji_man')->where('c_id', $id)->first();
        
        return view('Hrd::payroll.edit_set_manajemen',['data' => $data]);
    }
    public function updateGajiMan(Request $request, $id){
        $input = $request->except('_token', '_method','jumlah');
        $data = GajiManajemen::where('c_id', $id)->update($input);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function deleteGajiMan($id){

        $data = DB::table('m_gaji_man')->where('c_id', $id)->delete();

        return redirect('/hrd/payroll/setting-gaji');
    }
    public function tambahGajiPro()
    {

        return view('Hrd::payroll/tambah_set_produksi');
    }
    public function simpanGajiPro(Request $request){
        // dd($request->all());
        $input = $request->all();
        $data = GajiProduksi::create($input);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function editGajiPro($id){
        $data = DB::table('m_gaji_pro')->where('c_id', $id)->first();
        $list = explode(',', $data->c_gaji_jabatan);
        if ($list == "") {
            for ($i=0; $i <count($list); $i++) {
            $txt[$i] = DB::table('m_jabatan_pro')->select('c_id','c_jabatan_pro')
                    ->orWhere('c_id', $list[$i])
                    ->first(); 
            }
        }else{
            $txt = DB::table('m_jabatan_pro')->select('c_id','c_jabatan_pro')
                    ->get(); 
        }
        
        return view('Hrd::payroll/edit_set_produksi',['data' => $data, 'txt' => $txt, 'list' => $list]);
    }
    public function updateGajiPro(Request $request, $id){
        // dd($request->all());
        if (count($request->form_cek) > 0) {
            $tunjangan = implode(',', $request->form_cek);
        }else{
            $tunjangan = null;
        }
        m_gaji_pro::where('c_id', $id)
            ->update([
                'nm_gaji' => $request->nm_gaji,
                'c_status' => $request->c_status,
                'c_gaji' => $request->c_gaji,
                'c_lembur' => $request->c_lembur,
                'c_gaji_jabatan' => $tunjangan,
                'updated_at' => Carbon::now()
            ]);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function deleteGajiPro($id){
        $data = DB::table('m_gaji_pro')->where('c_id', $id)->delete();

        return redirect('/hrd/payroll/setting-gaji');
    }
    public function tambahPotongan(){
        return view('hrd/payroll/tambah_set_potongan');
    }
    public function simpanPotongan(Request $request){
        $input = $request->all();
        $data = Potongan::create($input);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function editPotongan($id){
        $data = DB::table('m_potongan')->where('c_id', $id)->first();
        
        return view('hrd/payroll/edit_set_potongan',['data' => $data]);
    }
    public function updatePotongan(Request $request, $id){
        $input = $request->except('_token', '_method','jumlah');
        $data = Potongan::where('c_id', $id)->update($input);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function deletePotongan($id){
        $data = DB::table('m_potongan')->where('c_id', $id)->delete();

        return redirect('/hrd/payroll/setting-gaji');
    }
    public function tambahTunjangan()
    {

        return view('Hrd::payroll/tambah_set_tunjangan');
    }
    public function tunjanganManData(){
        $list = DB::table('m_tunjangan_man')->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                    return '<div class="text-center">
                                <button id="edit" 
                                    onclick="editTunjangan('.$data->tman_id.')" 
                                    class="btn btn-warning btn-sm" title="Edit">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                </button>'.'
                                <button id="delete" 
                                    onclick="hapusTunjangan('.$data->tman_id.')" 
                                    class="btn btn-danger btn-sm" title="Hapus">
                                    <i class="glyphicon glyphicon-trash"></i>
                                </button>
                            </div>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addColumn('nilai', function ($data) {
                    return '<div>Rp.
                      <span class="pull-right">
                        '.number_format( floatval($data->tman_value) ,2,',','.').'
                      </span>
                    </div>';
                })
                ->addColumn('periode', function ($data) {
                    if($data->tman_periode == "ST"){
                        $periode = "Statis";
                    }elseif($data->tman_periode == "JM"){
                        $periode = "Jam";
                    }elseif($data->tman_periode == "HR"){
                        $periode = "Hari";
                    }elseif($data->tman_periode == "MG"){
                        $periode = "Minggu";
                    }elseif($data->tman_periode == "BL"){
                        $periode = "Bulan";
                    }elseif($data->tman_periode == "TH"){
                        $periode = "Tahun";
                    }
                    return $periode;
                })
                ->rawColumns(['action','nilai'])
                ->make(true);
    }
    public function simpanTunjangan(Request $request){
        $data = new m_tunjangan_man;
        $data->tman_levelpeg = $request->level;
        $data->tman_nama = $request->nama;
        $data->tman_periode = $request->periode;
        $data->tman_value = str_replace('.', '', $request->nilai);
        $data->tman_created = Carbon::now('Asia/Jakarta');
        $data->save();
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function editTunjangan($id){
        $data = DB::table('m_tunjangan_man')->where('tman_id', $id)->first();
        return view('Hrd::payroll/edit_set_tunjangan',['data' => $data]);
    }
    public function updateTunjangan(Request $request, $id){
        m_tunjangan_man::where('tman_id','=', $id)
            ->update([
                'tman_nama' => $request->nama,
                'tman_levelpeg' => $request->level,
                'tman_periode' => $request->periode,
                'tman_value' => str_replace('.', '', $request->nilai),
                'tman_updated' => Carbon::now('Asia/Jakarta')
            ]);
        
        return redirect('/hrd/payroll/setting-gaji');
    }
    public function deleteTunjangan($id){
        $data = DB::table('m_tunjangan_man')->where('tman_id', $id)->delete();
        return redirect('/hrd/payroll/setting-gaji');
    }


    public function setTunjanganPegMan()
    {
        return view('Hrd::payroll.set_tunjangan_peg_man');
    }
    public function tunjanganPegManData(){
        $list = DB::table('m_pegawai_man')
                ->join('m_divisi', 'm_pegawai_man.c_divisi_id','=','m_divisi.c_id')
                ->join('m_jabatan', 'm_pegawai_man.c_jabatan_id','=','m_jabatan.c_id')
                ->select('m_pegawai_man.*', 'm_divisi.c_divisi', 'm_jabatan.c_posisi')
                ->get();
        $data = collect($list);
        return Datatables::of($data)           
                ->addColumn('action', function ($data) {
                    return '<button id="edit" onclick="edit_t_pegman('.$data->c_id.')" class="btn btn-warning btn-sm" title="Edit"><i class="glyphicon glyphicon-pencil"></i></button>';
                })
                ->addColumn('none', function ($data) {
                    return '-';
                })
                ->addColumn('tunjangan', function ($data) {
                    
                    if ($data->c_tunjangan != null) 
                    {
                        $t_list = explode(',', $data->c_tunjangan);

                        $aaa = '<ul style="list-style-type:square">';
                        for ($i=0; $i <count($t_list); $i++) 
                        { 
                            $txt = DB::table('m_tunjangan_man')->select('tman_nama')->where('tman_id', $t_list[$i])->first();
                            $aaa .=  '<li>'.$txt->tman_nama.'</li>';
                        }
                        $aaa .= '</ul>';
                        return $aaa;
                    }
                    else
                    {
                        return '-';
                    }

                })
                ->rawColumns(['action','tunjangan'])
                ->make(true);
    }
    public function editPegManData($id)
    {
        // $id_peg = Auth::user()->m_pegawai_id;
        $data = DB::table('m_pegawai_man')
            ->join('m_jabatan', 'm_pegawai_man.c_jabatan_id', '=', 'm_jabatan.c_id')
            ->join('m_divisi', 'm_pegawai_man.c_divisi_id', '=', 'm_divisi.c_id')
            ->select('m_pegawai_man.*', 'm_jabatan.c_posisi', 'm_jabatan.c_sub_divisi_id','m_divisi.c_divisi')
            ->where('m_pegawai_man.c_id', $id)->first();
        
        if ($data->c_sub_divisi_id == '1') 
        {
            $list = explode(",", $data->c_tunjangan);
            $tunjangan = DB::table('m_tunjangan_man')->where('tman_levelpeg', '!=' ,'ST')->get();
        }
        else
        {
            $list = explode(",", $data->c_tunjangan);
            $tunjangan = DB::table('m_tunjangan_man')->where('tman_levelpeg', '!=' ,'LD')->get();
        }
        return view('Hrd::payroll/edit_set_tunjangan_peg',['data' => $data, 'tunjangan' => $tunjangan, 'list'=>$list]);
    }

    public function updateTunjanganPeg(Request $request, $id)
    {
        if (count($request->form_cek) > 0) {
            $tunjangan = implode(',', $request->form_cek);
        }else{
            $tunjangan = null;
        }
        
        DB::table('m_pegawai_man')->where('c_id','=', $request->idpeg)
            ->update([
                'c_tunjangan' => $tunjangan,
                'updated_at' => Carbon::now('Asia/Jakarta')
            ]);
        
        return redirect('/hrd/payroll/set-tunjangan-pegawai-man');
    }
}
