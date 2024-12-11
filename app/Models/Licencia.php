<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Licencia extends Model
{
    //
    protected $fillable = [
        'fecha_emision', // Ej. Hotel Boutique, Restaurante, etc.
        'fecha_vencimiento',
        'estado', // Relaciona el tipo de servicio con un servicio
        'institucion_id' // Relaciona el tipo de servicio con un servicio
    ];
    public function institucion()
    {
        return $this->belongsTo('App\Models\Institucion');
    }
    public function notificacion()
    {
        return $this->hasMany('App\Models\Notificacion');
    }
}
