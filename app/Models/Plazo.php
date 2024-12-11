<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plazo extends Model
{
    //
    protected $fillable = [
        'fecha_inicio',
        'dias',
        'fecha_fin',
        'responsable_id',
        'tramite_id',
      ];
     //Relacion de muchos a uno
     public function Tramite(){
        return $this->belongsTo('App\Model\Tramite');
    }
}
