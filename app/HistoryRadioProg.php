<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryRadioProg extends Model
{
    public function programHistory(){

    	return $this->belongsTo('App\Program');
    }
}
