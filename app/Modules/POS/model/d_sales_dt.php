<?php

namespace App\Modules\POS\model;

use Illuminate\Database\Eloquent\Model;

use DB;

use App\m_item;

class d_sales_dt extends Model
{  
    protected $table = 'd_sales_dt';
    protected $primaryKey = 'sd_sales';
    public $timestamps=false;
    
     protected $fillable = ['sd_sales','sd_comp','sd_position','sd_date','sd_detailid','sd_item','sd_qty','sd_price','sd_disc_percent','sd_disc_value','sd_total','sd_disc_percentvalue'];
	static function penjualanDt($sd_sales=''){		
		// return'a';

		// return $sd_sales;
		return DB::table('d_sales')
		// ->select('m_satuan.s_id')
		->leftjoin('d_sales_dt','d_sales.s_id','=','sd_sales')
		->leftjoin('m_item','sd_item','=','i_id')
		->leftjoin('m_satuan','d_sales.s_id','=','m_satuan.s_id')
		->where('sd_sales',$sd_sales)
		->where('s_channel','=','Toko')
		->leftjoin('d_stock',function($join){
			$join->on('d_stock.s_item','=','i_id');
			$join->on('d_stock.s_comp','=','sd_comp');
			$join->on('d_stock.s_position','=','sd_position');
		})
		->get();
	}

	function d_sales() {
		$res = $this->belongsTo('App\Modules\POS\model\d_sales', 'sd_sales', 's_id');

        return $res;
	}

	function m_item() {
		$res = $this->belongsTo('App\m_itemm', 'sd_item', 'i_id');

        return $res;
	}
}
	
	