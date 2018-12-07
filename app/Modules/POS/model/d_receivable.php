<?php

namespace App\Modules\POS\model;

use Illuminate\Database\Eloquent\Model;

use DB;

use App\m_item;

class d_receivable extends Model
{  
    protected $table = 'd_receivable';
    protected $primaryKey = 'r_id';
    public $timestamps=false;
    
     protected $fillable = ['r_id',
							'r_date',
							'r_duedate',
							'r_type',
							'r_code',
							'r_mem',
							'r_ref',
							'r_value',
							'r_pay',
							'p_outstanding',
							'r_created',
							'r_updated'];
	
	
}
	
	