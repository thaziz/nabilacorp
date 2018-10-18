<?php

namespace App\Modules\Master\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\m_customer;
use App\m_itemm;
use Carbon\carbon;
use App\Http\Controllers\Controller;

use DB;

use Datatables;

use Auth;






class itemController extends Controller
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
      return view('Master::databarang/barang');
    }
    public function dataBarang(){
      return m_itemm::dataBarang();      
    }


    public function tambah(){
      $kelompok = DB::table('m_group')
                  ->get();

      $satuan = DB::table('m_satuan')
                ->get();

      return view('Master::databarang/tambah_barang', compact('kelompok','satuan'));
    }

    public function Supplier(){
      $supplier = DB::table('m_supplier')
                  ->get();

      return response()->json($supplier);
    }

    public function simpan(Request $request){
      DB::beginTransaction();
      try {

        $id = DB::table('m_item')
              ->max('i_id');

        $kode = DB::table('m_item')
                ->max('i_code');

        $tmp = $kode + 1;

        $kode = sprintf("%05s", $tmp);

        $type = '';

        if ($request->kelompok == 1) {
          $type = 'BB';
        } elseif ($request->kelompok == 2) {
          $type = 'BP';
        } elseif ($request->Kelompok == 3) {
          $type = 'BJ';
        } elseif ($request->kelompok == 4) {
          $type = 'BPJ';
        }

      if (!empty($request->supplier)) {
        for ($i=0; $i < count($request->supplier); $i++) {
          $tmp = str_replace('.', '', $request->hargasupplier[$i]);
          $hargasupplier = str_replace('Rp ', '', $tmp);

          $idsupplier = DB::table('d_item_supplier')
                        ->max('is_id');


            DB::table('d_item_supplier')
            ->insert([
              'is_id' => $idsupplier + 1,
              'is_item' => $id + 1,
              'is_supplier' => $request->supplier[$i],
              'is_price' => $hargasupplier,
              'is_active' => 'Y'
            ]);
        }
      }

      if (empty($request->hargabeli)) {
        $tmp = str_replace('.', '', $request->hargajual);
        $hargajual = str_replace('Rp ', '', $tmp);

        $tmp = str_replace('.', '', $request->hargabeli);
        $hargabeli = str_replace('Rp ', '', $tmp);

        DB::table('m_item')
          ->insert([
            'i_id' => $id + 1,
            'i_code' => $kode,
            'i_group' => $request->kelompok,
            'i_type' => $type,
            'i_name' => $request->nama,
            'i_satuan' => $request->satuan,
            'i_price' => $hargajual,
            'i_hpp' => $hargabeli,
            'i_det' => $request->detail,
            'i_status' => 'Y',
            'i_active' => 'Y',
            'i_insert' => Carbon::now('Asia/Jakarta')
          ]);
      } else {
        $tmp = str_replace('.', '', $request->hargabeli);
        $hargabeli = str_replace('Rp ', '', $tmp);

        $tmp = str_replace('.', '', $request->hargajual);
        $hargajual = str_replace('Rp ', '', $tmp);

        DB::table('m_item')
          ->insert([
            'i_id' => $id + 1,
            'i_code' => $kode,
            'i_group' => $request->kelompok,
            'i_type' => $type,
            'i_name' => $request->nama,
            'i_satuan' => $request->satuan,
            'i_price' => $hargajual,
            'i_hpp' => $hargabeli,
            'i_det' => $request->detail,
            'i_status' => 'Y',
            'i_active' => 'Y',
            'i_insert' => Carbon::now('Asia/Jakarta')
          ]);
      }


        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal'
        ]);
      }

    }

    public function edit($id){
      $kelompok = DB::table('m_group')
                  ->get();

      $satuan = DB::table('m_satuan')
                ->get();

      $datasatuan = DB::table('m_item')
                    ->where('i_id', $id)
                    ->get();

      $dataduaan = DB::table('m_item')
                    ->leftjoin('d_item_supplier', 'is_item', '=', 'i_id')
                    ->leftjoin('m_supplier', 'm_supplier.s_id', '=', 'is_supplier')
                    ->leftjoin('m_group', 'g_id', '=', 'i_group')
                    ->where('i_id', $id)
                    ->get();

      $supplier = DB::table('m_supplier')
                  ->get();

      return view('Master::databarang/edit_barang', compact('kelompok', 'satuan', 'datasatuan', 'dataduaan', 'supplier'));
    }

    public function update(Request $request){
      DB::beginTransaction();
      try {

        DB::table('d_item_supplier')
            ->where('is_item', $request->id)
            ->delete();

        DB::table('m_item')
            ->where('i_id', $request->id)
            ->delete();

        $id = $request->id;

        $kode = $request->kode;

        $type = '';

        if ($request->kelompok == 1) {
          $type = 'BB';
        } elseif ($request->kelompok == 2) {
          $type = 'BP';
        } elseif ($request->Kelompok == 3) {
          $type = 'BJ';
        } elseif ($request->kelompok == 4) {
          $type = 'BPJ';
        }

      if (!empty($request->supplier)) {
        for ($i=0; $i < count($request->supplier); $i++) {
          $tmp = str_replace('.', '', $request->hargasupplier[$i]);
          $hargasupplier = str_replace('Rp ', '', $tmp);

          $idsupplier = DB::table('d_item_supplier')
                        ->max('is_id');


            DB::table('d_item_supplier')
            ->insert([
              'is_id' => $idsupplier + 1,
              'is_item' => $id,
              'is_supplier' => $request->supplier[$i],
              'is_price' => $hargasupplier,
              'is_active' => 'Y'
            ]);
        }
      }

      if (empty($request->hargabeli)) {
        $tmp = str_replace('.', '', $request->hargajual);
        $hargajual = str_replace('Rp ', '', $tmp);

        $tmp = str_replace('.', '', $request->hargabeli);
        $hargabeli = str_replace('Rp ', '', $tmp);

        DB::table('m_item')
          ->insert([
            'i_id' => $id,
            'i_code' => $kode,
            'i_group' => $request->kelompok,
            'i_type' => $type,
            'i_name' => $request->nama,
            'i_satuan' => $request->satuan,
            'i_price' => $hargajual,
            'i_hpp' => $hargabeli,
            'i_det' => $request->detail,
            'i_status' => 'Y',
            'i_active' => 'Y',
            'i_insert' => Carbon::now('Asia/Jakarta')
          ]);
      } else {
        $tmp = str_replace('.', '', $request->hargabeli);
        $hargabeli = str_replace('Rp ', '', $tmp);

        $tmp = str_replace('.', '', $request->hargajual);
        $hargajual = str_replace('Rp ', '', $tmp);

        DB::table('m_item')
          ->insert([
            'i_id' => $id,
            'i_code' => $kode,
            'i_group' => $request->kelompok,
            'i_type' => $type,
            'i_name' => $request->nama,
            'i_satuan' => $request->satuan,
            'i_price' => $hargajual,
            'i_hpp' => $hargabeli,
            'i_det' => $request->detail,
            'i_status' => 'Y',
            'i_active' => 'Y',
            'i_insert' => Carbon::now('Asia/Jakarta')
          ]);
      }


        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal'
        ]);
      }
    }

    public function hapus(Request $request){
      DB::beginTransaction();
      try {

        DB::table('d_item_supplier')
          ->where('is_item', $request->id)
          ->update([
            'is_active' => 'N'
          ]);

        DB::table('m_item')
          ->where('i_id', $request->id)
          ->update([
            'i_active' => 'N',
            'i_status' => 'N'
          ]);

        DB::commit();
        return response()->json([
          'status' => 'berhasil'
        ]);
      } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
          'status' => 'gagal'
        ]);
      }

    }
}
 /*<button class="btn btn-outlined btn-info btn-sm" type="button" data-target="#detail" data-toggle="modal">Detail</button>*/
