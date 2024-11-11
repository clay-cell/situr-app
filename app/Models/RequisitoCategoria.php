<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequisitoCategoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Ej. Características Generales
        'categorizacion' // Ej. 1 Estrella
    ];

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo('App\Models\Categoria');
    }

    // Relación con SubGrupoRequisito
    public function subgrupos()
    {
        return $this->hasMany('App\Models\SubGrupoRequisito');
    }
}
