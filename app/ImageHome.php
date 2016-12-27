<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageHome extends Model
{
	protected $table = 'image_homes';

	public function category(){
    return $this->belongsTo('App\ImageHomeCateg');
    }
}
