<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requisito extends Model
{
  use HasFactory;
  //Relacion de uno a muchos
   public function pre_requisitos(){
    return $this->hasMany('App\Models\PreRequisito');
  }

  //Relacion de muchos a uno
  public function servicios(){
    return $this->belongsTo('App\Models\Servicio');
  }
  public function tipo_tramites(){
    return $this->belongsTo('App\Models\TipoTramite');
  }
  
}
