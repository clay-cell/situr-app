<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemPrerequisito extends Model
{
  //Relacion de uno a muchos
  public function presentados(){
    return $this->hasMany('App\Models\Presentado');
  }
  //Relacion de muchos a uno
  public function pre_requisitos(){
    return $this->belongsTo('App\Models\PreRequisito');
  }
}
