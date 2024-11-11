<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Representante extends Model
{
    //
    public function tiene(){
        return $this->belongsTo('App\Models\tiene');
      }
}
