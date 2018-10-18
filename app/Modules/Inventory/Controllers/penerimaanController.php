<?php
namespace App\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\mMember;
use DB;
use Carbon\Carbon;
use DateTime;
use Yajra\Datatables\Datatables;
use Session;

class penerimaanController extends Controller {
	public function __construct(){
        $this->middleware('auth');
    }

	public function index()
	{
		$data = DB::table('d_pengiriman')
							->where('p_status_diterima', 'N')
							->select('p_code', 'p_id')
							->get();

		return view('Inventory::Penerimaan.index', compact('data'));
	}

	public function getdata(Request $request){
			$data = DB::table('d_pengiriman')
							->join('d_pengiriman_dt', 'pd_pengiriman', '=', 'p_code')
							->join('m_item', 'i_id', '=', 'pd_item')
							->where('p_id', $request->id)
							->get();

			for ($i=0; $i < count($data); $i++) {
				if ($data[$i]->pd_penerima == null) {
					$data[$i]->pd_penerima = '-';
				}
			}

			return response()->json($data);
	}

	public function terima(Request $request){
		DB::beginTransaction();
		try {

			$data = DB::table('d_pengiriman_dt')
								->where('pd_id', $request->id)
								->get();

			DB::table('d_pengiriman_dt')
					->where('pd_id', $request->id)
					->update([
						'pd_diterima' => $data[0]->pd_qty,
						'pd_penerima' => Session::get('user_comp'),
						'pd_status_diterima' => 'Y',
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
