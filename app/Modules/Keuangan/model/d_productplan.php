<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class d_productplan extends Model
{
    protected $table = 'd_productplan';
    protected $primaryKey = 'pp_id';
    const CREATED_AT = 'pp_insert';
    const UPDATED_AT = 'pp_update';
    
      protected $fillable = ['pp_id',
      						 'pp_date',
      						 'pp_item', 
      						 'pp_qty', 
      						 'pp_isspk',];
}
