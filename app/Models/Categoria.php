<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Ej. 4 Estrellas, 5 Estrellas, etc.
        'descripcion',
        'tipo_servicio_id' // Relaciona la categoría con un tipo de servicio
    ];

    // Relación con TipoServicio
    public function tipoServicio()
    {
        return $this->belongsTo('App\Models\TipoServicio');
    }

    // Relación con RequisitoCategoria
    public function requisitos()
    {
        return $this->hasMany('App\Models\RequisitoCategoria');
    }
}

