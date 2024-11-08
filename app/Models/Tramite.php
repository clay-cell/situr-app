<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tramite extends Model
{
  use HasFactory;
  //Relacion de uno a muchos
  public function seguimientos(){
    return $this->hasMany('App\Models\Seguimiento');
  }
  public function presentados(){
    return $this->hasMany('App\Models\Presentado');
  }


  //Relacion de muchos a uno
  public function institucions(){
    return $this->belongsTo('App\Models\Institucion');
  }
  public function servicios(){
    return $this->belongsTo('App\Models\Servicio');
  }
  public function tipo_tramites(){
    return $this->belongsTo('App\Models\TipoTramite');
  }
}
