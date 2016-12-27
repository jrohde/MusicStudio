<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionImage extends Model
{
    public function production()
    {
    	return $this->belongsTo('App\Production');
    }
}
