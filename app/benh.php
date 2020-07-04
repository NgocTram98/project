<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class benh extends Model
{
    //
    protected $table = "benh";
    public function duoclieu()
    {
    	return $this->hasMany('App\duoclieu','idbenh','id');
    }

}

