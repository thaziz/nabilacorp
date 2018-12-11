<?php

namespace App\Modules\POS\model;

use Illuminate\Database\Eloquent\Model;


use App\Modules\POS\model\d_receivable_dt;

use App\Lib\mutasi;

use App\Lib\format;

use App\m_item;

use DB;

use Auth;

use Datatables;

use Session;

class d_receivable_dt extends Model
{  
    protected $table = 'd_receivable_dt';    
    const CREATED_AT = 'rd_created';
    const UPDATED_AT = 'rd_updated';


     protected $fillable = ['rd_receivable',
							'rd_detailid' ,
							'rd_datepay',							
							'rd_value',							
							'rd_status'
						   ];
}
	
?>
