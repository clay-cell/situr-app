<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Nombre del tipo de tasa, como "TASA DE EVALUACIÓN Y SEGUIMIENTO AMBIENTAL"
        'descripcion' // Descripción opcional
    ];

    // Relación uno a muchos con Tasa
    public function tasas()
    {
        return $this->hasMany(Tasa::class);
    }
}
