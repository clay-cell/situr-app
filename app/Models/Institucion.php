<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{
    protected $guarded = ['id']; // Solo protege el campo 'id'
    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'estado',
        'fecha_actividad',
        'servicio_id',
        'tipo_servicio_id',
        'categoria_id',
        'qr',  // Agrega el campo del QR aquí
        'enlace',  // Agrega el campo del QR aquí
    ];
    use HasFactory;

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
    //Relacion de uno a muchos
    public function licencia()
    {
        return $this->hasMany('App\Models\Licencia');
    }
    //Relacion de uno a muchos
    public function sancion_institucion()
    {
        return $this->hasMany('App\Models\sancion_institucion');
    }
}
