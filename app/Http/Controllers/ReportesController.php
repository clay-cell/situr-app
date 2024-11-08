<?php

namespace App\Http\Controllers;


use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\Servicio;
use App\Models\TipoTramite;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
  public function requisitos_tramite($servicio_id,$tipo_tramite){
    $servicio = Servicio::select('tipo_servicio')
    ->where('id', $servicio_id)
    //->where('estado', 1)
    ->get();
    //return $servicio;
    $tramite = TipoTramite::select('nombre_tramite')
    ->where('id',$tipo_tramite)
    //->where('estado', 1)
    ->get();
    //return $tramite;
    $requisitos = Requisito::select('id','tramite','descripcion')
    ->where('servicio_id', $servicio_id)
    ->where('tipo_tramite_id', $tipo_tramite)
    ->where('estado', 1)->get();
    //return $requisitos;
    $prerequisitos = PreRequisito::select('grupo','descripcion')
    ->where('requisito_id', $requisitos[0]->id)
    ->where('estado', 1)
    ->get();
    // Extraemos los primeros elementos
    $primerosElementos = [];
    foreach ($prerequisitos as $primeros) {
        $primerosElementos[] = $primeros->grupo;
    }
    // Eliminamos duplicados
    $unicos = array_unique($primerosElementos);
    $fechahora = Carbon::now()->format('d/m/Y H:i:s');
    //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
    $requisitospdf=PDF::loadview('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
    $requisitospdf->setpaper("letter","portrait");//tamaño de papel y direccion vertical; landscape es horizontal
    return $requisitospdf->stream('requisitos.pdf');//este comando, muestra el pdf en una ventana
  }
}
