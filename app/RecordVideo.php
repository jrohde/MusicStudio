<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecordVideo extends Model
{
    public function record()
    {
    	//$recordVideo = App\RecordVideo::find($id);
    	return $this->belongsTo('App\Record');
    }
}
