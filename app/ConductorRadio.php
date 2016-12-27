<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConductorRadio extends Model
{
    public function conductor(){

    	return $this->belongsTo('App\Program');
    }
}
