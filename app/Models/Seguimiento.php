<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seguimiento extends Model
{
  use HasFactory;
  public function tramites(){
    return $this->belongsTo('App\Models\Tramite');
  }
}
