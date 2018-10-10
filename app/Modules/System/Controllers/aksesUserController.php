<?php

namespace App\Modules\System\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use Carbon\carbon;
use App\Http\Controllers\Controller;

use DB;

use Auth;

use Illuminate\Support\Facades\Crypt;
use Yajra\Datatables\Datatables;

class aksesUserController extends Controller
{
    public function index()
    {
        return view('System::hakaksesuser/user');
    }

    public function dataUser()
    {
        $user = DB::table('d_mem')
            ->select('m_id', 'm_name', 'm_username')
            ->orderBy('m_name')
            ->get();

        $user = collect($user);
        return Datatables::of($user)
            ->addColumn('aksi', function ($user){
                    return '<div align="center">
                            <button style="margin-left:5px;" title="Akses" type="button" class="btn btn-primary btn-xs" onclick="akses(\'' . Crypt::encrypt($user->m_id) . '\')"><i class="glyphicon glyphicon-wrench"></i></button>
                            </div>';
            })
            ->rawColumns(['aksi'])
            ->make(true);


    }

    public function editUserAkses($id)
    {
        $id = Crypt::decrypt($id);
        $user = DB::table('d_mem')
            ->join('d_mem_comp', 'mc_mem', '=', 'm_id')
            ->join('m_comp', 'c_id', '=', 'mc_comp')
            ->select('d_mem.*', 'm_comp.*', DB::raw('DATE_FORMAT(m_lastlogin, "%d/%m/%Y %h:%i") as m_lastlogin'), DB::raw('DATE_FORMAT(m_lastlogout, "%d/%m/%Y %h:%i") as m_lastlogout'))
            ->where('m_id', '=', $id)
            ->first();

        $akses = DB::select("select * from d_access left join d_mem_access on a_id = ma_access and ma_mem = '".$id."' order by a_order");

        $id = Crypt::encrypt($id);

        return view('System::hakaksesuser/akses', compact('akses', 'user', 'id'));
    }

    public function save(Request $request)
    {
        //dd($request);
        DB::beginTransaction();
        try {
            $read = $request->read;
            $insert = $request->insert;
            $update = $request->update;
            $delete = $request->delete;
            $id = Crypt::decrypt($request->id);

            $akses = DB::table('d_access')
                ->select('a_id')
                ->get();

            $cek = DB::table('d_mem_access')
                ->where('ma_mem', '=', $id)
                ->get();

            if (count($cek) > 0){
                //== update data
                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->update([
                        'ma_read' => 'N',
                        'ma_insert' => 'N',
                        'ma_update' => 'N',
                        'ma_delete' => 'N'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $read)
                    ->update([
                        'ma_read' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $insert)
                    ->update([
                        'ma_insert' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $update)
                    ->update([
                        'ma_update' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $delete)
                    ->update([
                        'ma_delete' => 'Y'
                    ]);
            } else {
                //== create data
                $addAkses = [];
                for ($i = 0; $i < count($akses); $i++){
                    $temp = [
                        'ma_mem' => $id,
                        'ma_access' => $akses[$i]->a_id
                    ];
                    array_push($addAkses, $temp);
                }
                DB::table('d_mem_access')->insert($addAkses);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $read)
                    ->update([
                        'ma_read' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $insert)
                    ->update([
                        'ma_insert' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $update)
                    ->update([
                        'ma_update' => 'Y'
                    ]);

                DB::table('d_mem_access')
                    ->where('ma_mem', '=', $id)
                    ->whereIn('ma_access', $delete)
                    ->update([
                        'ma_delete' => 'Y'
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
    
    // public function checkAkses($a_id, $aksi)
    // {
    //     $m_id = Auth::user()->m_id;
    //     $cek = null;
    //     if ($aksi == 'read'){
    //         $cek = DB::table('d_mem_access')
    //             ->where('ma_mem', '=', $m_id)
    //             ->where('ma_access', '=', $a_id)
    //             ->where('ma_read', '=', 'Y')
    //             ->get();
    //     } elseif ($aksi == 'insert'){
    //         $cek = DB::table('d_mem_access')
    //             ->where('ma_mem', '=', $m_id)
    //             ->where('ma_access', '=', $a_id)
    //             ->where('ma_insert', '=', 'Y')
    //             ->get();
    //     } elseif ($aksi == 'update'){
    //         $cek = DB::table('d_mem_access')
    //             ->where('ma_mem', '=', $m_id)
    //             ->where('ma_access', '=', $a_id)
    //             ->where('ma_update', '=', 'Y')
    //             ->get();
    //     } elseif ($aksi == 'delete'){
    //         $cek = DB::table('d_mem_access')
    //             ->where('ma_mem', '=', $m_id)
    //             ->where('ma_access', '=', $a_id)
    //             ->where('ma_delete', '=', 'Y')
    //             ->get();
    //     }
    //     if (count($cek) > 0){
    //         return true;
    //     } else {
    //         return false;
    //     }
    // }

}
