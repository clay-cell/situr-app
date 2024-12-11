<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Presentado extends Model
{
  use HasFactory;
  
   protected $fillable = [
    'gestion',
    'fecha_presentacion',
    'observacion',
    'documento',
    'ruta',
    'aceptado',
    'tramite_id',
    'item_prerequisito_id',
  ];

  //Relacion de muchos a uno
   public function tramites(){
    return $this->belongsTo('App\Models\Tramite');
  }
   public function item_prerequisitos(){
    return $this->belongsTo('App\Models\ItemPreRequisito');
  }
  
}
