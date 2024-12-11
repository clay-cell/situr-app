<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoSancion extends Model
{
    //
    protected $fillable = [
        'nombre',
        'fecha_asignacion',
        'ruta',
        'sancion_institucion_id',
      ];
    public function sancion_institucion()
    {
        return $this->belongsTo('App\Models\sancion_institucion');
    }
}
