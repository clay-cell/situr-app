<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    //
    protected $fillable = [
        'fecha_asignacion', // Ej. Hotel Boutique, Restaurante, etc.
        'motivo',
        'mensaje', // Relaciona el tipo de servicio con un servicio
        'nuevo', // Relaciona el tipo de servicio con un servicio
        'licencia_id' // Relaciona el tipo de servicio con un servicio
    ];
    public function licencia(){
        return $this->belongsTo('App\Models\Licencia');
      }
}
