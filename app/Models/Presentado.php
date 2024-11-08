<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentado extends Model
{
  use HasFactory;
   //Relacion de muchos a uno
   protected $fillable = [
    'gestion',
    'fecha_presentacion',
    'observacion',
    'documento',
    'ruta',
    'aceptado',
    'tramite_id',
    'pre_requisito_id',
  ];
  public function pre_requisitos(){
    return $this->belongsTo('App\Models\PreRequisito');
  }
  public function tramites(){
    return $this->belongsTo('App\Models\Tramite');
  }
}
