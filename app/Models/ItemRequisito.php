<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemRequisito extends Model
{
    use HasFactory;

    protected $fillable = [
        'descripcion', // Ej. Espacio adecuado para área de planchado y almacenaje
        'valor_minimo', // Ej. 10
        'tipo_medida', // Ej. "número" o "porcentaje"
        'sub_grupo_requisito_id' // Relaciona el ítem con un subgrupo requisito
    ];

    // Relación con SubGrupoRequisito
    public function subGrupoRequisito()
    {
        return $this->belongsTo('App\Models\SubGrupoRequisito');
    }
}
