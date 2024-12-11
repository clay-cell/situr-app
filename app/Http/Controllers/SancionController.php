<?php

namespace App\Http\Controllers;

use App\Models\Servicio;
use Illuminate\Http\Request;

class SancionController extends Controller
{
    //
    public function tipo_sancion(){
        return view('sanciones.mostrar_tipo_sanciones');
    }
    public function sanciones_servicio($id){
        $servicio=Servicio::find($id);
        if(!$servicio){
            return view('error404');
        }
        return view('sanciones.mostrar_sanciones',compact('servicio'));
    }
}
