<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = "comment";
    public function caythuoc()
    {
    	return $this->belongsTo('App\caythuoc','Idcaythuoc','id');
    }
    public function baithuoc()
    {
    	return $this->belongsTo('App\baithuoc','Idbaithuoc','id');
    }
    public function duoclieu()
    {
    	return $this->belongsTo('App\duoclieu','Idduoclieu','id');
    }
    public function users()
    {
    	return $this->belongsTo('App\user','Iduser','id');
    }

}
