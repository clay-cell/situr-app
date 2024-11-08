<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
  use HasFactory;
  //Relacion de muchos a uno
  public function users(){
    return $this->belongsTo('App\Models\User');
  }
  //Relacion de uno a muchos
  public function tramites(){
      return $this->hasMany('App\Models\Tramite');
  }
}
