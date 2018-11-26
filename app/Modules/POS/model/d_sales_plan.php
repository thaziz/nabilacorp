<?php
   namespace App\Modules\POS\model;
   
   use Illuminate\Database\Eloquent\Model;
   
   use App\Modules\POS\model\d_salesplan_dt;
   
   use App\Lib\mutasi;
   
   use App\Lib\format;
   
   use App\d_sales_payment;
   
   use App\m_itemm;
   
   use DB;
   
   use Auth;
   
   use Datatables;
   
   use Session;
   
   class d_sales_plan extends Model {  
      protected $table = 'd_sales_plan';
      protected $primaryKey = 'sp_id';
      const CREATED_AT = 'sp_created';
      const UPDATED_AT = 'sp_updated';
       
      protected $fillable = ['sp_id', 'sp_code', 'sp_comp', 'sp_mem', 'sp_date'];
   
      static function simpan($request){        
           return DB::transaction(function () use ($request) {      
              $sp_mem = format::format($request->sp_mem);
              $sp_comp = Session::get('user_comp');
              $sp_date = format::format($request->s_date);
              $sp_date = date('Y-m-d', strtotime($sp_date));  
     
              $sp_id = DB::table('d_sales_plan')->select(DB::raw('IFNULL(MAX(sp_id), 0) + 1 AS sp_id'))->get()->first(); 
              $sp_id = $sp_id->sp_id;
              
              $sp_code='RENCANAPENJUALAN-'.$sp_id.'/'.date('Y.m.d');
              d_sales_plan::create([
                  'sp_id' => $sp_id,
                  'sp_code' => $sp_code,
                  'sp_comp' => $sp_comp,
                  'sp_mem' => $sp_mem,
                  'sp_date' => $sp_date
              ]);
   
              for ($i=0; $i < count($request->sd_item); $i++) {  
                  $sd_qty = format::format($request->sd_qty[$i]);
                  $sd_item = format::format($request->sd_item[$i]);
                  $spdt_detailid = $i + 1;             

                  d_salesplan_dt::create([
                      'spdt_salesplan' => $sp_id,
                      'spdt_detailid' => $spdt_detailid,
                      'spdt_item' => $sd_item,
                      'spdt_qty' => $sd_qty
                  ]);               
              }
   
           
              $data=['status'=>'sukses','data'=>'sukses' ,'sp_id'=>$sp_id,'s_status'=>$request->status];
               return response()->json($data);
         });
      }
      
      static function perbarui($request) {
        return DB::transaction(function() use ($request) {
          $d_salesplan_dt = d_salesplan_dt::where('spdt_salesplan', $spdt_salesplan);
          $d_salesplan_dt->delete();
          $spdt_item = $request->spdt_item;
          $spdt_item = $spdt_item != null ? $spdt_item : array();
          if(count($spdt_item) > 0) {
            for($x = 0;$x < count($spdt_item);$x++) {
              
            }
          }
        });

      }  
      public function d_salesplan_dt() {

        $res = $this->belongsTo('App\Modules\POS\model\d_salesplan_dt', 'sp_id', 'spdt_salesplan');

        return $res;
      }

      public function hapus($id = '') {
        $status = "gagal";
        if($id != '' ){
          $d_sales_plan = d_sales_plan::find($id);
          $d_sales_plan->delete();
          $d_salesplan_dt = d_salesplan_dt::where('spdt_salesplan', $id);
          $d_salesplan_dt->delete(); 
        } 
      }


   }
    
   