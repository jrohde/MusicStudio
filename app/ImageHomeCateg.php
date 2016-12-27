<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageHomeCateg extends Model
{
	protected $table = 'image_home_categs';
	
    public function images(){
    	return $this->hasMany('App\ImageHome');
    }
}
