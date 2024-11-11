<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubGrupoRequisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', // Ej. 2. GENERALES, 3.7 ACCESO Y CIRCULACIÓN
        'requisito_categoria_id' // Relaciona el subgrupo con un requisito categoría
    ];

    // Relación con RequisitoCategoria
    public function requisitoCategoria()
    {
        return $this->belongsTo('App\Models\RequisitoCategoria');
    }

    // Relación con ItemRequisito
    public function items()
    {
        return $this->hasMany('App\Models\ItemRequisito');
    }
}
