<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Response;

class m_pegawai extends Model
{  
    protected $table = 'm_pegawai';
    protected $primaryKey = 'c_id';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
}