<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $dates = [
        'fecha_ingreso',
        'fecha_salida',
        'hora_entrada',
        'hora_salida',
    ];
}
