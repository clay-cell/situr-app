<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentoTramite extends Model
{
    //
    protected $fillable = [
        'documento',
        'fecha_asignacion',
        'vigencia',
        'ruta',
        'tramite_id',
    ];
    public function Tramite()
    {
        return $this->belongsTo('App\Models\Tramite');
    }
}
