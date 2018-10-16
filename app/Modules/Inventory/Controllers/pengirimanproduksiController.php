<?php
namespace App\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\mMember;
use DB;
use Carbon\Carbon;

class pengirimanproduksiController extends Controller {
	public function __construct(){
        $this->middleware('auth');
    }

	public function index()
	{
		$data = DB::table('d_productresult')
						->where('pr_status', null)
						->get();

		$tujuan = DB::table('d_gudangcabang')
							->get();

		return view('Inventory::pengirimanproduksi', compact('data', 'tujuan'));
	}

	public function simpan(Request $request){
		DB::beginTransaction();
		try {

			$id = DB::table('d_pengiriman')
						->max('p_id');

			if ($id < 0) {
				$id = 0;
			}

			$kode = "";

        $querykode = DB::select(DB::raw("SELECT MAX(MID(p_code,4,3)) as counter, MAX(MID(p_code,8,2)) as bulan, MAX(MID(p_code,10)) as tahun FROM d_pengiriman"));

        if (count($querykode) > 0) {
          if ($querykode[0]->bulan != date('m') || $querykode[0]->tahun != date('Y')) {
              $kode = "001";
          } else {
            foreach($querykode as $k)
              {
                $tmp = ((int)$k->counter)+1;
                $kode = sprintf("%03s", $tmp);
              }
          }
        } else {
          $kode = "001";
        }


        $finalkode = 'PB-' . $kode . '/' . date('m') . date('Y');

				$produksi = DB::table('d_productresult')
										->where('pr_code', $request->nota)
										->get();

			DB::table('d_productresult')
									->where('pr_code', $request->nota)
									->update([
										'pr_status' => 'Dikirim'
									]);

			DB::table('d_pengiriman')
				->insert([
					'p_id' => $id + 1,
					'p_pr' => $finalkode,
					'p_tanggal_produksi' => $produksi[0]->pr_date,
					'p_tanggal_transfer' => Carbon::parse($request->p_tanggal_transfer)->format('Y-m-d'),
					'p_keterangan' => $request->keterangan,
					'p_insert' => Carbon::now('Asia/Jakarta')
				]);

			for ($i=0; $i < count($request->kirim); $i++) {
				$iddt = DB::table('d_pengiriman_dt')
								->max('pd_id');

						if ($iddt < 0) {
							$iddt = 0;
						}

				if ($request->kirim[$i] != 0 || $request->kirim[$i] != null || $request->kirim[$i] != '') {
					DB::table('d_pengiriman_dt')
						->insert([
							'pd_id' => $iddt + 1,
							'pd_pengiriman' => $finalkode,
							'pd_qty' => $request->kirim[$i],
							'pd_insert' => Carbon::now('Asia/Jakarta')
						]);

						$update = DB::table('d_productresult')
											->join('d_productresult_dt', 'prdt_productresult', '=', 'pr_id')
											->where('pr_code', $request->nota)
											->where('prdt_item', $request->item[$i])
											->get();

						if ($update[0]->prdt_kirim == 0) {
							DB::table('d_productresult_dt')
												->where('prdt_productresult', $update[0]->pr_id)
												->where('prdt_detailid', $update[0]->prdt_detailid)
												->where('prdt_item', $request->item[$i])
												->update([
													'prdt_kirim' => $request->kirim[$i]
												]);
						} else {
							$kurang = $request->kirim[$i] + $update[0]->prdt_kirim;
							DB::table('d_productresult_dt')
												->where('prdt_productresult', $update[0]->pr_id)
												->where('prdt_detailid', $update[0]->prdt_detailid)
												->where('prdt_item', $request->item[$i])
												->update([
													'prdt_kirim' => $kurang
												]);											
						}
				}
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

	public function getdata(Request $request){
		$data = DB::table('d_productresult')
						->join('d_productresult_dt', 'prdt_productresult', '=', 'pr_id')
						->join('m_item', 'i_id', '=', 'prdt_item')
						->where('pr_id', $request->id)
						->get();

		return response()->json($data);
	}

}
