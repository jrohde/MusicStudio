<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
   public function articles()
   {
      return $this->belongsToMany('App\Article')->withPivot('amount');
   }
}
