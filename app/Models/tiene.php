<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tiene extends Model
{
    //
    //Relacion de muchos a uno
    public function institucions()
    {
        return $this->belongsTo('App\Models\Institucion');
    }
    //Relacion de muchos a uno
    public function representante()
    {
        return $this->belongsTo('App\Models\Represetante');
    }
}
