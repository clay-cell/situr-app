<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisito;
use App\Models\Servicio;

class PrerequisitoController extends Controller
{
  public function index($id){
    //return $id;
    $requisito=Requisito::find($id,['id','descripcion','tipo_tramite_id','servicio_id']);
    $servicio=Servicio::find($requisito->servicio_id,['id','tipo_servicio']);
    return view('prerequisito.lista',compact('requisito','servicio'));

    //return $servicio;
  }
}
