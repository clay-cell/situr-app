<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sancion_institucion extends Model
{
    //
    public function Institucion()
    {
        return $this->belongsTo('App\Models\Institucion');
    }
    public function item_sancion()
    {
        return $this->belongsTo('App\Models\item_sancion');
    }
     //Relacion de uno a muchos
   public function DocumentoSancion(){
    return $this->hasMany('App\Models\DocumentoSancion');
  }

}
