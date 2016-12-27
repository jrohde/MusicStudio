<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function promos()
    {
       return $this->belongsToMany('App\Promo')->withPivot('amount');
    }
    public function type()
    {
       return $this->belongsTo('App\Type');
    }
}
