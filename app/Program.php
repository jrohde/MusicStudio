<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model //ficha programa
{
	public function details(){

		return $this->hasMany('App\ProgramDetail');
	}
	public function images(){

    	return $this->hasMany('App\ImgRadioProgram');
    }
    public function videos(){

    	return $this->hasMany('App\VideoRadioProg');
    }
    public function histories(){

    	return $this->hasMany('App\HistoryRadioProg');
    }
    public function conductors(){

        return $this->hasMany('App\ConductorRadio');
    }

}
