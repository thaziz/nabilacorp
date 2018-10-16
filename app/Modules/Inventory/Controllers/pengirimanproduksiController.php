<?php
namespace App\Modules\Inventory\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\mMember;
use DB;

class pengirimanproduksiController extends Controller {
	public function __construct(){
        $this->middleware('auth');
    }

	public function index()
	{
		$data = DB::table('d_productresult')
						->get();

		return view('Inventory::pengirimanproduksi', compact('data'));
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
