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
        'servicio_id',
        'tipo_servicio_id',
        'categoria_id',
        'otros',
        'tipo_tasa_id', // Clave foránea para TipoTasa
        'identificador' // Indica si es una tasa de registro u otra
    ];

    // Relación con TipoTasa
    public function tipoTasa()
    {
        return $this->belongsTo(TipoTasa::class);
    }

    // Otras relaciones...
    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function tipoServicio()
    {
        return $this->belongsTo(TipoServicio::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
