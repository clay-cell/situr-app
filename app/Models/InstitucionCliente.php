<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstitucionCliente extends Model
{
    //
    //Relacion de muchos a uno
    public function users()
    {
        return $this->belongsTo('App\Models\User');
    }
    //Relacion de uno a muchos
    public function tramites()
    {
        return $this->hasMany('App\Models\Tramite');
    }

    // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio');
    }

    // Relación con TipoServicio
    public function tipoServicio()
    {
        return $this->belongsTo('App\Models\TipoServicio');
    }

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }
}
