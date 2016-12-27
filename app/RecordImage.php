<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordImage extends Model
{
    public function record()
    {
    	return $this->belongsTo('App\Record');
    }
}
