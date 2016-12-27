<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionVideo extends Model
{
    public function production()
    {
    	return $this->belongsTo('App\Production');
    }
}
