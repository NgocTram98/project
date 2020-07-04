<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class caythuoc extends Model
{
    //
    protected $table = "caythuoc";
    public function comment()
    {
    	return $this->hasMany('App\comment','Idcaythuoc','id');
    }
}
