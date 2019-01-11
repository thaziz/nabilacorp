<?php

namespace App\Modules\Nabila\model;

use Illuminate\Database\Eloquent\Model;

use DB;
use Response;
use Datatables;
use Session;

class member extends Model
{
    protected $table = 'm_member';  
    protected $primaryKey = 'm_id';
    const CREATED_AT = 'm_insert';
    const UPDATED_AT = 'm_update';

}
