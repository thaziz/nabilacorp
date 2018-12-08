<?php

namespace App\Modules\POS\model;

use Illuminate\Database\Eloquent\Model;

use App\Modules\POS\model\d_receivable_dt;

use App\Lib\mutasi;

use App\Lib\format;

use App\d_receivable_payment;

use App\m_item;

use DB;

use Auth;

use Datatables;

use Session;

class d_receivable extends Model
{  
    protected $table = 'd_receivable';
    protected $primaryKey = 'r_id';
    const CREATED_AT = 'r_created';
    const UPDATED_AT = 'r_updated';
    

}
	
?>