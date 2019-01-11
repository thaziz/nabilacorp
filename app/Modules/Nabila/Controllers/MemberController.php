<?php

namespace App\Modules\Nabila\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;
use DB;
use Auth;

use App\Modules\Nabila\model\member;

use Session;

class MemberController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index() { 
           
        return view('Nabila::member/index');
    }

    public function form_insert() {
        return view('Nabila::member/form_insert'); 
    }

    public function form_alter($id) {
        $m_member = member::where('m_id', $id);
        $m_member = $m_member->select('m_id', 'm_name', 'm_nik', 'm_birth', 'm_telp', 'm_address', 'm_email', DB::raw('DATE_FORMAT(m_birth, "%m-%d") AS m_birth_label'))->first();
        $data = ['m_member' => $m_member];
        return view('Nabila::member/form_alter', $data); 
    }

    public function get_data_all()
    {
        $all = member::orderBy('m_insert', 'desc')->get();

        $res = ['data' => $all];
        return response()->json($res);
    }

    public function get_data_active()
    {
        $active = member::where('m_status', 'AKTIF')->orderBy('m_insert', 'desc')->get();

        $res = ['data' => $active];
        return response()->json($res);
    }

    public function get_data_nonactive()
    {
        $nonactive = member::where('m_status', 'NONAKTIF')->orderBy('m_insert', 'desc')->get();

        $res = ['res' => $nonactive];
        return response()->json($res);
    }

    public function detail($id)
    {

        

            
            $member = member::where('m_nik', $id)->first();
            $res = [
                'data' => $member,
            ];
            return view('Nabila::member/form_detail', $res);
        
    }

    public function getDataId()
    {
        $cek = DB::table('d_mem')
            ->select(DB::raw('max(right(m_id, 7)) as id'))
            ->get();

        foreach ($cek as $x) {
            $temp = ((int)$x->id + 1);
            $kode = sprintf("%07s", $temp);
        }

        $tempKode = 'MPF' . $kode;
        return $tempKode;
    }

    public function simpan_tambah(Request $request)
    {

                    $data = $request->all();
                    DB::beginTransaction();

                    try {

                      $data['m_birth'] = preg_replace('/(\d+)[\/-](\d+)[\/-](\d+)/', '$3-$2-$1', $data['m_birth']);

                        member::insert([
                            'm_name' => strtoupper($data['name']),
                            'm_nik' => $data['nik'],
                            'm_telp' => $data['telp'],
                            'm_email' => $data['email'],
                            'm_address' => $data['address'],
                            'm_birth' => $data['m_birth'],
                            'm_status' => 'AKTIF',
                            'm_insert' => Carbon::now('Asia/Jakarta'),
                            'm_update' => Carbon::now('Asia/Jakarta')
                        ]);

                        DB::commit();
                        

                        return response()->json([
                            'status' => 'sukses',
                            'name' => strtoupper($data['name'])
                        ]);                            
                    } catch (\Exception $e) {

                        DB::rollback();

                        $message = 'Error. ' . $e;
                        // something went wrong
                        return response()->json([
                            'status' => 'gagal',
                            'msg' => $message
                        ]);

                    }
                
            
        
    }

    public function simpan_edit(Request $request, $id = null)
    {
         $data = $request->all();
                    DB::beginTransaction();

                    try {

                      $data['m_birth'] = preg_replace('/(\d+)[\/-](\d+)[\/-](\d+)/', '$3-$2-$1', $data['m_birth']);

                        

                        DB::commit();
                        

                        return response()->json([
                            'status' => 'sukses',
                            'name' => strtoupper($data['name'])
                        ]);                            
                    } catch (\Exception $e) {

                        DB::rollback();

                        $message = 'Error. ' . $e;
                        // something went wrong
                        return response()->json([
                            'status' => 'gagal',
                            'msg' => $message
                        ]);

                    }   
    }

    public function active($id)
    {
            DB::beginTransaction();
            try {
                $cek = member::where('m_nik', Crypt::decrypt($id))->count();

                if ($cek != 0) {

                    member::where('m_nik', Crypt::decrypt($id))->update(['m_status' => 'AKTIF']);

                    DB::commit();

                    $data = member::where('m_nik', Crypt::decrypt($id))->select('m_name', 'm_telp')->first();
                    $log = 'Mengubah Status Member ' . $data->m_name . ' (' . $data->m_telp . ') = AKTIF';
                    Plasma::logActivity($log);

                    return json_encode([
                        'status' => 'aktifberhasil',
                        'name' => $data->m_name
                    ]);
                } else {
                    return json_encode([
                        'status' => 'tidak ada'
                    ]);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return json_encode([
                    'status' => 'gagal',
                    'msg' => $e
                ]);
            }
       
    }

    public function nonactive($id)
    {
        if (Plasma::checkAkses(47, 'update') == true) {
            DB::beginTransaction();
            try {
                $cek = member::where('m_nik', Crypt::decrypt($id))->count();

                if ($cek != 0) {

                    member::where('m_nik', Crypt::decrypt($id))->update(['m_status' => 'NONAKTIF']);

                    DB::commit();

                    $data = member::where('m_nik', Crypt::decrypt($id))->select('m_name', 'm_telp')->first();
                    $log = 'Mengubah Status Member ' . $data->m_name . ' (' . $data->m_telp . ') = NONAKTIF';
                    Plasma::logActivity($log);

                    return json_encode([
                        'status' => 'nonaktifberhasil',
                        'name' => $data->m_name
                    ]);
                } else {
                    return json_encode([
                        'status' => 'tidak ada'
                    ]);
                }
            } catch (\Exception $e) {
                DB::rollback();
                return json_encode([
                    'status' => 'gagal',
                    'msg' => $e
                ]);
            }
        } else {
            return json_encode([
                'status' => 'ditolak'
            ]);
        }
    }

    public function delete($id)
    {
        
        

            DB::beginTransaction();

            try {
                if($id != '') {
                    $member = member::where('m_id', $id);
                    $member->delete();

                    DB::commit();
                    return response()->json([
                        'status' => 'sukses'
                    ]);
                }
                else {
                    return response()->json([
                        'status' => 'gagal',
                        'msg' => 'Data kosong'
                    ]);  
                }
               
            } catch (\Exception $e) {

                DB::rollback();

                // something went wrong
                return response()->json([
                    'status' => 'gagal',
                    'msg' => $e
                ]);
            }
        
    }
   
}
