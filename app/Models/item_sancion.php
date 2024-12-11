<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class item_sancion extends Model
{
    //
    protected $fillable = [
        'nombre_sancion',
        'estado',
        'servicio_id',
        'sancion_id',
      ];
    public function sanciones()
    {
        return $this->belongsTo('App\Models\sanciones');
    }
    public function sancion_institucion()
    {
        return $this->hasMany('App\Models\sancion_institucion');
    }
}
