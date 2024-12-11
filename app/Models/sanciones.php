<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sanciones extends Model
{
    protected $fillable = [
        'tipo_sancion',
      ];
    //
     //Relacion de uno a muchos
     public function item_sancion()
     {
         return $this->hasMany('App\Models\item_sancion');
     }
}
