<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public function musics(){

    	return $this->hasMany('App\MusicRecord');
    }
    public function images(){

    	return $this->hasMany('App\RecordImage');
    }
    public function videos(){

    	return $this->hasMany('App\RecordVideo', 'id_rec');
    }
}
