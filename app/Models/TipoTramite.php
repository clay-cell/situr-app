<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTramite extends Model
{
  use HasFactory;
  
  //definiendo los campos que seran llenados, este array hace que funcione el metodo create en los controladores
  protected $fillable = [
    'nombre_tramite',
    'estado',
  ];

  //Relacion de uno a muchos
  
  public function requisitos(){
    return $this->hasMany('App\Models\Requisito');
  }
}
