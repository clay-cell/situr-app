<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Ej. Hotel Boutique, Restaurante, etc.
        'descripcion',
        'servicio_id' // Relaciona el tipo de servicio con un servicio
    ];

    // Relación con Servicio
    public function servicio()
    {
        return $this->belongsTo('App\Models\Servicio');
    }

    // Relación con Categoria
    public function categorias()
    {
        return $this->hasMany('App\Models\Categoria');
    }
}
