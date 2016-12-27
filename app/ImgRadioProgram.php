<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgRadioProgram extends Model
{
    public function programImg(){

    	return $this->belongsTo('App\Program');
    }
}
