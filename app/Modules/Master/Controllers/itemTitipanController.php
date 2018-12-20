<?php

namespace App\Modules\Master\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use App\m_satuan;
use App\m_group;
use App\m_price;
use App\Modules\Master\model\m_item_titipan;
use Carbon\carbon;
use App\Http\Controllers\Controller;

use DB;

use Datatables;

use Auth;






class itemTitipanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

   /* public function cut(){
      $connector = new FilePrintConnector("\\\TAZIZ-PC\POS-80");
      $printer = new Printer($connector);
      $printer -> cut();
      $printer -> close();

    }*/
    public function index(){
      return view('Master::databarangtitipan/barang');
    }
    public function dataBarang(){
      return m_item_titipan::dataBarang();
    }


    public function tambah(){
      $kelompok = DB::table('m_group')
                  ->get();

      $satuan = DB::table('m_satuan')
                ->get();

      return view('Master::databarangtitipan/tambah_barang', compact('kelompok','satuan'));
    }

    public function Supplier(){
      $supplier = DB::table('m_supplier')
                  ->get();

      return response()->json($supplier);
    }

    public function simpan(Request $request){
      DB::beginTransaction();
      try {

        $id = DB::table('m_item_titipan')
              ->max('it_id');

        $tmp = $id + 1;

        $kode = sprintf("%04s", $tmp);
        $it_code = 'BRG' . $kode;
        $it_group = $request->it_group;
        $it_group = $it_group != null ? $it_group : '';
        $it_type = $request->it_type;
        $it_type = $it_type != null ? $it_type : '';
        $it_name = $request->it_name;
        $it_name = $it_name != null ? $it_name : '';
        $it_det = $request->it_det;
        $it_det = $it_det != null ? $it_det : '';
        $it_sat1 = $request->it_sat1;
        $it_sat1 = $it_sat1 != null ? $it_sat1 : '';
        $it_sat2 = $request->it_sat2;
        $it_sat2 = $it_sat2 != null ? $it_sat2 : '';
        $it_sat3 = $request->it_sat3;
        $it_sat3 = $it_sat3 != null ? $it_sat3 : '';
        $it_sat_isi1 = $request->it_sat_isi1;
        $it_sat_isi1 = $it_sat_isi1 != null ? $it_sat_isi1 : '';
        $it_sat_isi2 = $request->it_sat_isi2;
        $it_sat_isi2 = $it_sat_isi2 != null ? $it_sat_isi2 : '';
        $it_sat_isi3 = $request->it_sat_isi3;
        $it_sat_isi3 = $it_sat_isi3 != null ? $it_sat_isi3 : '';
        $it_min_stock = $request->it_min_stock;
        $it_min_stock = $it_min_stock != null ? $it_min_stock : '';
        // Ke tabel m_price
        $m_pbuy1 = $request->m_pbuy1;
        $m_pbuy1 = $m_pbuy1 != null ? $m_pbuy1 : '';
        $m_pbuy2 = $request->m_pbuy2;
        $m_pbuy2 = $m_pbuy2 != null ? $m_pbuy2 : '';
        $m_pbuy3 = $request->m_pbuy3;
        $m_pbuy3 = $m_pbuy3 != null ? $m_pbuy3 : '';
        // Ke tabel d_item_supplier
        $its_supplier = $request->its_supplier;
        $its_supplier = $its_supplier != null ? $its_supplier : array();
        $its_price = $request->its_price;
        $its_price = $its_price != null ? $its_price : array();
        // ===============================================
        // if (!empty($request->supplier)) {
        //   for ($i=0; $i < count($request->supplier); $i++) {
        //     $tmp = str_replace('.', '', $request->hargasupplier[$i]);
        //     $hargasupplier = str_replace('Rp ', '', $tmp);

        //     $idsupplier = DB::table('d_item_supplier')
        //                   ->max('its_id');


        //       DB::table('d_item_supplier')
        //       ->insert([
        //         'its_id' => $idsupplier + 1,
        //         'its_item' => $id + 1,
        //         'its_supplier' => $request->supplier[$i],
        //         'its_price' => $hargasupplier,
        //         'its_active' => 'Y'
        //       ]);
        //   }
        // }

        DB::table('m_item_titipan')
          ->insert([
            'it_id' => $tmp,
            'it_code' => $it_code,
            'it_group' => $it_group,
            'it_type' => $it_type,
            'it_name' => $it_name,
            'it_sat1' => $it_sat1,
            'it_sat2' => $it_sat2,
            'it_sat3' => $it_sat3,
            'it_sat_isi1' => $it_sat_isi1,
            'it_sat_isi2' => $it_sat_isi2,
            'it_sat_isi3' => $it_sat_isi3,
            'it_min_stock' => $it_min_stock,
            'it_det' => $it_det,
            'it_status' => 'Y',
            'it_active' => 'Y',
            'it_insert' => Carbon::now('Asia/Jakarta')
          ]);
      

        for($x = 0; $x < count($its_supplier);$x++) {
          DB::table('d_item_supplier')
            ->insert([
              'its_item' => $tmp,
              'its_supplier' => $its_supplier[$x],
              'its_price' => $its_price[$x],
              'its_active' => 'Y',
              'its_created' => Carbon::now('Asia/Jakarta')
            ]);
        }
      
        DB::table('m_price')
          ->insert([
            'm_pitem' => $tmp,
            'm_pbuy1' => $m_pbuy1,
            'm_pbuy2' => $m_pbuy2,
            'm_pbuy3' => $m_pbuy3,
            'm_psell1' => $m_pbuy1,
            'm_psell2' => $m_pbuy2,
            'm_psell3' => $m_pbuy3,
            'm_pcreated' => Carbon::now('Asia/Jakarta'),

          ]);
      


        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal. '. $e
        ]);
      }

    }

    public function edit($id){

      $m_item = DB::table('m_item_titipan')
                    ->leftjoin('m_group', 'it_group', '=', 'g_id')
                    ->leftjoin(DB::raw('m_satuan S1'), 'it_sat1', '=', 'S1.s_id')
                    ->leftjoin(DB::raw('m_satuan S2'), 'it_sat2', '=', 'S2.s_id')
                    ->leftjoin(DB::raw('m_satuan S3'), 'it_sat3', '=', 'S3.s_id')
                    ->where('it_id', $id)
                    ->first();
      $m_price = m_price::where('m_pitem', $id)->get()->first();
      if($m_price == null) {
        $m_price = array( 
          'm_pbuy1' => 0, 
          'm_pbuy2' => 0, 
          'm_pbuy3' => 0 
        );
      }
      $m_group = m_group::all();                    
      $m_satuan = m_satuan::all();                    
      $d_item_supplier = DB::table('d_item_supplier')
        ->leftjoin('m_supplier', 'its_supplier', '=', 's_id')->where('its_item', $id)->get();
      $res = array(
        'm_item_titipan' => $m_item, 
        'm_price' => $m_price, 
        'd_item_supplier' => $d_item_supplier, 
        'kelompok' => $m_group, 
        'satuan' => $m_satuan
      );
      
      // die(json_encode($res));
      return view('Master::databarangtitipan/edit_barang', $res);
    }

    public function update(Request $request){

      DB::beginTransaction();
      try {

        $it_id = $request->it_id;
        $it_id = $it_id != null ? $it_id : '';
        $it_group = $request->it_group;
        $it_group = $it_group != null ? $it_group : '';
        $it_type = $request->it_type;
        $it_type = $it_type != null ? $it_type : '';
        $it_name = $request->it_name;
        $it_name = $it_name != null ? $it_name : '';
        $it_det = $request->it_det;
        $it_det = $it_det != null ? $it_det : '';
        $it_sat1 = $request->it_sat1;
        $it_sat1 = $it_sat1 != null ? $it_sat1 : '';
        $it_sat2 = $request->it_sat2;
        $it_sat2 = $it_sat2 != null ? $it_sat2 : '';
        $it_sat3 = $request->it_sat3;
        $it_sat3 = $it_sat3 != null ? $it_sat3 : '';
        $it_sat_isi1 = $request->it_sat_isi1;
        $it_sat_isi1 = $it_sat_isi1 != null ? $it_sat_isi1 : '';
        $it_sat_isi2 = $request->it_sat_isi2;
        $it_sat_isi2 = $it_sat_isi2 != null ? $it_sat_isi2 : '';
        $it_sat_isi3 = $request->it_sat_isi3;
        $it_sat_isi3 = $it_sat_isi3 != null ? $it_sat_isi3 : '';
        $it_min_stock = $request->it_min_stock;
        $it_min_stock = $it_min_stock != null ? $it_min_stock : '';
        // Ke tabel m_price
        $m_pid = $request->m_pid;
        $m_pid = $m_pid != null ? $m_pid : '';
        $m_pbuy1 = $request->m_pbuy1;
        $m_pbuy1 = $m_pbuy1 != null ? $m_pbuy1 : '';
        $m_pbuy2 = $request->m_pbuy2;
        $m_pbuy2 = $m_pbuy2 != null ? $m_pbuy2 : '';
        $m_pbuy3 = $request->m_pbuy3;
        $m_pbuy3 = $m_pbuy3 != null ? $m_pbuy3 : '';
        // Ke tabel m_supplier
        $its_supplier = $request->its_supplier;
        $its_supplier = $its_supplier != null ? $its_supplier : array();
        $its_price = $request->its_price;
        $its_price = $its_price != null ? $its_price : array();
        // ===============================================
        // if (!empty($request->supplier)) {
        //   for ($i=0; $i < count($request->supplier); $i++) {
        //     $tmp = str_replace('.', '', $request->hargasupplier[$i]);
        //     $hargasupplier = str_replace('Rp ', '', $tmp);

        //     $idsupplier = DB::table('d_item_supplier')
        //                   ->max('its_id');


        //       DB::table('d_item_supplier')
        //       ->insert([
        //         'its_id' => $idsupplier + 1,
        //         'its_item' => $id + 1,
        //         'its_supplier' => $request->supplier[$i],
        //         'its_price' => $hargasupplier,
        //         'its_active' => 'Y'
        //       ]);
        //   }
        // }

        DB::table('m_item_titipan')
          ->where('it_id', $it_id)
          ->update([
            'it_group' => $it_group,
            'it_type' => $it_type,
            'it_name' => $it_name,
            'it_sat1' => $it_sat1,
            'it_sat2' => $it_sat2,
            'it_sat3' => $it_sat3,
            'it_sat_isi1' => $it_sat_isi1,
            'it_sat_isi2' => $it_sat_isi2,
            'it_sat_isi3' => $it_sat_isi3,
            'it_min_stock' => $it_min_stock,
            'it_det' => $it_det,
            'it_update' => Carbon::now('Asia/Jakarta')
          ]);
      
        DB::table('m_price')
          ->where('m_pid', $m_pid)
          ->update([
            'm_pbuy1' => $m_pbuy1,
            'm_pbuy2' => $m_pbuy2,
            'm_pbuy3' => $m_pbuy3,
            'm_psell1' => $m_pbuy1,
            'm_psell2' => $m_pbuy2,
            'm_psell3' => $m_pbuy3,
            'm_pupdated' => Carbon::now('Asia/Jakarta'),

          ]);
        // Ke tabel d_item_supplier
        DB::table('d_item_supplier')->where('its_item', $it_id)->delete();
        for($x = 0; $x < count($its_supplier);$x++) {
          DB::table('d_item_supplier')
            ->insert([
              'its_item' => $tmp,
              'its_supplier' => $its_supplier[$x],
              'its_price' => $its_price[$x],
              'its_active' => 'Y',
              'its_created' => Carbon::now('Asia/Jakarta')
            ]);
        }

        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal. ' . $e
        ]);
      }
    }

    public function hapus(Request $request){
      DB::beginTransaction();
      try {

        DB::table('d_item_titipan_supplier')
          ->where('its_item', $request->id)
          ->update([
            'its_active' => 'N'
          ]);

        DB::table('m_item_titipan')
          ->where('it_id', $request->id)
          ->update([
            'it_active' => 'N',
            'it_status' => 'N'
          ]);

        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'Gagal. ' . $e
        ]);
      }

    }
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/
