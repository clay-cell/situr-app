<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Requisito;

class RequisitosController extends Controller
{
  public function index($servicio_id){
    //return $servicio_id;
    $servicio=Servicio::select('id','tipo_servicio')->where('id',$servicio_id)->get();
    //return $servicio;
    if($servicio->count()>0){
      $requisitos=Requisito::where('servicio_id',$servicio_id)->get();
      return view('requisitos.lista',compact('servicio'));
      //return $requisitos;
    }
    return view('error404');
  }



}
