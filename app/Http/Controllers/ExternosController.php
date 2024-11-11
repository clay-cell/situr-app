<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Servicio;
use Illuminate\Http\Request;

class ExternosController extends Controller
{
    //
    public function index(){
        return view('externos.mostrar_externos');
    }
    public function establecimientos($id){
        $servicios=Servicio::find($id);
        //return $servicios;
        if(!$servicios){
            return view('error404');
        }
        return view('externos.mostrar_establecimientosparaexternos',compact('servicios'));
    }
    public function clientesestablecimeintos($id){
        $institucion=Institucion::find($id);
        return view('externos.mostrar_clientesestablecimiento',compact('institucion'));
    }
}
