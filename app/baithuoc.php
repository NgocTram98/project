<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class baithuoc extends Model
{
    //
    protected $table = "baithuoc";
    public function comment()
    {
    	return $this->hasMany('App\comment','Idbaithuoc','id');
    }
}

