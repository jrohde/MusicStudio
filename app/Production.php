<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Production extends Model
{
    public function music(){

    	return $this->hasMany('App\MusicProduction');
    }
    public function image(){

    	return $this->hasMany('App\ProductionImage');
    }
    public function video(){

    	return $this->hasMany('App\ProductionVideo');
    }
}
