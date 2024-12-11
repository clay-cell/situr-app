<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
  use HasFactory;
  protected $fillable = [
    'fecha_plazo',
    'fecha_inicio',
    'fecha_fin',
    'observacion',
    'instancia',
    'tramite_id',
  ];
  public function tramites(){
    return $this->belongsTo('App\Models\Tramite');
  }
}
