<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasa extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'descripcion',
        'monto_inicial',
        'monto_fijo',
        'servicio_id', // Relacionado con Servicio
        'tipo_servicio_id', // Relacionado con Tipo de Servicio
        'categoria_id', // Relacionado con Categoria
        'otros' // Para cualquier otro tipo de tasa general
    ];

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
