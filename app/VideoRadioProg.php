<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoRadioProg extends Model
{
    public function programVideo(){

    	return $this->belongsTo('App\Program');
    }
}
