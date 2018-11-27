<?php

namespace App\Modules\Master\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JabatanController extends Controller
{
    public function index(){
    	
    	return view('Master::datajabatan.datajabatan');
    }
}
