<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\TipoTramite;
use Illuminate\Http\Request;

class InstitucionController extends Controller
{
    public function index()
    {
        // Obtiene todos los registros de instituciones activos
        //$instituciones = Institucion::where('estado', true)->get();

        // Retorna la vista y pasa las instituciones a la vista
        $tramites = TipoTramite::all();
        return view('welcome',compact('tramites'));
    }
}
