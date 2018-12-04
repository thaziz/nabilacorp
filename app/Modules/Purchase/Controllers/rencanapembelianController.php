<?php

namespace App\Modules\Purchase\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\carbon;
use DB;
use App\Http\Controllers\Controller;
use App\mMember;
use Datatables;
use Session;
class rencanapembelianController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function rencana()
    {
        return view('/purchasing/rencanapembelian/rencana');
    }
   
    public function create()
    {
      // return Auth::user();
        $gudang = DB::table('d_gudangcabang')->where('gc_comp',Session::get('user_comp'))->get();
        return view('Purchase::rencanapembelian/create',compact('gudang'));
    }
    
}