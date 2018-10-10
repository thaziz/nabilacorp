<?php

namespace App\Modules\POS\model;

use Illuminate\Database\Eloquent\Model;

use DB;

use Datatables;

use App\Lib\format;

use App\Lib\mutasi;

use Session;

class d_item_titip extends Model
{  



    protected $table = 'd_item_titip';
    protected $primaryKey = 'it_id';
    const CREATED_AT = 'it_created';
    const UPDATED_AT = 'it_updated';

    protected $fillable = ['it_id','it_comp','it_code','it_date','it_toko','it_note','it_total','it_keterangan','it_status','it_bayar','it_disc'];

    static function itemTitip($request){
      $from=date('Y-m-d',strtotime($request->tanggal1));
      $to=date('Y-m-d',strtotime($request->tanggal2));
      

             $itemTitip=d_item_titip::whereBetween('it_date', [$from, $to])->where('it_comp',Session::get('user_comp'))->get();
             return Datatables::of($itemTitip)                                                
                        ->editColumn('it_date', function ($itemTitip) {                            
                                return date('d-m-Y',strtotime($itemTitip->it_date));                            
                        })    
                        ->editColumn('it_total', function ($itemTitip) {                            
                                return number_format($itemTitip->it_total,'0',',','.');                            
                        })                                       
                        ->addColumn('action', function ($itemTitip) {  
                          $disable='';
                          if($itemTitip->it_status=='terima'){
                            $disable='disabled';
                          }
                          $html='';  
                          $html.='<div class="text-center">
                          <button type="button" class="btn btn-sm btn-primary" title="Serah Terima" onclick="serahterima(
                                               '.$itemTitip->it_id.',          
                                                \''.date('d-m-Y',strtotime($itemTitip->it_date)).'\',   
                                                \''.$itemTitip->it_code.'\',
                                                \''.$itemTitip->it_keterangan.'\'  
                          )"  '.$disable.' ><i class="fa fa-folder-open-o"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-success" title="Detail" onclick="detailMutasi(
                                                '.$itemTitip->it_id.',          
                                                \''.date('d-m-Y',strtotime($itemTitip->it_date)).'\',   
                                                \''.$itemTitip->it_code.'\',
                                                \''.$itemTitip->it_keterangan.'\'                                                
                          )"><i class="fa fa-eye"></i> 
                          </button>
                          <button class="btn btn-sm btn-warning" title="Edit" onclick="editMutasi(
                                               '.$itemTitip->it_id.',          
                                                \''.date('d-m-Y',strtotime($itemTitip->it_date)).'\',   
                                                \''.$itemTitip->it_code.'\',
                                                \''.$itemTitip->it_keterangan.'\'        
                          )" ><i class="fa fa-edit"></i>
                          </button>
                          <button type="button" class="btn btn-sm btn-danger" title="Hapus" onclick="deleteMutasi(
                                               '.$itemTitip->it_id.',          
                                                \''.date('d-m-Y',strtotime($itemTitip->it_date)).'\',   
                                                \''.$itemTitip->it_code.'\',
                                                \''.$itemTitip->it_keterangan.'\'  
                          )" ><i class="fa fa-times"></i>
                          </button>
                          </div>';
                            return $html;
                        })
                        ->rawColumns(['action'])
                      ->make(true);                                  
    }
    static function dataTitip($id){      
             $itemTitip=d_item_titip::where('it_comp',Session::get('user_comp'))->where('it_id',$id)->first();             
             return $itemTitip;

    }
     static function store($request){
         return DB::transaction(function () use ($request) {        
          
    $it_id=d_item_titip::max('it_id')+1;



     $query = DB::select(DB::raw("SELECT MAX(RIGHT(it_code,4)) as kode_max from d_item_titip WHERE DATE_FORMAT(it_created, '%Y-%m') = DATE_FORMAT(CURRENT_DATE(), '%Y-%m')"));
      $kd = "";

      if(count($query)>0)
      {
        foreach($query as $k)
        {
          $tmp = ((int)$k->kode_max)+1;
          $kd = sprintf("%05s", $tmp);
        }
      }
      else
      {
        $kd = "00001";
      }
      

      $it_code = "TTN-".date('ym')."-".$kd;

      $it_total= format::format($request->it_total);        
        
      d_item_titip::create([
            'it_id'=>$it_id,            
            'it_comp'=>Session::get('user_comp'),
            'it_code'=>$it_code,
            'it_date'=>date('Y-m-d',strtotime($request->it_date)),
            'it_keterangan'=>$request->it_keterangan,
            'it_total' =>$it_total,
        ]);


      $jumlah=count($request->idt_item);      
    for ($i=0; $i <$jumlah ; $i++) { 
      
        $idt_qty= format::format($request->idt_qty[$i]); 
        $hpp= format::format($request->idt_price[$i]);         
        if(mutasi::tambahmutasi($request->idt_item[$i],$idt_qty,1,1,'Barang Titip',1,$it_id,'','',$hpp)){
            $idt_detailid=d_itemTitip_dt::where('idt_itemTitip',$it_id)
                               ->max('idt_detailid')+1;                                           

            d_itemTitip_dt::create([
                'idt_itemtitip'=>$it_id,
                'idt_detailid'=>$idt_detailid,
                'idt_date'    => date('Y-m-d',strtotime($request->it_date)),
                'idt_comp'=>Session::get('user_comp'),
                'idt_item'=>$request->idt_item[$i],
                'idt_qty'=>$idt_qty,
                'idt_price'=>$hpp    
            ]);
      }
    }  

          $data=['status'=>'sukses','data'=>'sukses'];
          return json_encode($data);
      });
    }

static function chekQtyReturn($item,$comp,$position){
  $chekQtyReturn=d_itemTitip_dt::where('idt_action',DB::raw("'Ditukar Harga'"))
                    ->select(DB::raw('sum(idt_return) as idt_return'))
                    ->where('idt_item',$item)
                    ->groupBy('idt_item')
                    ->first();    
 if(count($chekQtyReturn)){
    $data=$chekQtyReturn->idt_return;
 }else{
    $data=0;
 }
  
  return json_encode($data);
}
static function serahTerimaStore($request){  
  return DB::transaction(function () use ($request) {      
    $updateTitipan=d_item_titipan::where('it_id',$request->it_id);
    $updateTitipan->update([
                      'it_status'=>'terima'
                    ]);
    // stock mutasi hanya untuk barang kembali.
    for ($i=0; $i <count($request->idt_item) ; $i++) { 
      $updateTitipanDt=d_itemTitip_dt::where('idt_itemTitip',$request->idt_itemTitip)->where('idt_detailid',$request->idt_detailid);
      $idt_terjual= format::format($request->idt_terjual[$i]);  
      $sisa= format::format($request->idt_sisa[$i]);  

      $idt_return= format::format($request->idt_return[$i]);  

      $updateTitipanDt->update([
            'idt_terjual'=>$idt_terjual,
            'idt_sisa'=>$sisa,
            'idt_return'=>$idt_return,
            'idt_action'=>$request->idt_action[$i]
        ]);
    }
    return 'sukses';
    });  
  }

   
}
	