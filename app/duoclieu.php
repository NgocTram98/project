<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class duoclieu extends Model
{
    //
    protected $table = "duoclieu";
    public function benh()
    {
    	return $this->belongsTo('App\benh','idbenh','id');
    }
    public function comment()
    {
    	return $this->hasMany('App\comment','Idduoclieu','id');
    }
}
