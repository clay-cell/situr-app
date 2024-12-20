<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRequisito extends Model
{
  use HasFactory;
  
  //Relacion de uno a muchos
  public function item_prerequisitos(){
    return $this->hasMany('App\Models\ItemPrerequisito');
  }
  
  //Relacion de muchos a uno
  public function requisitos(){
    return $this->belongsTo('App\Models\Requisito');
  }
}
