<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Requisito;
use App\Models\PreRequisito;
use App\Models\Presentado;
use App\Models\Servicio;
use App\Models\TipoTramite;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use Carbon\Carbon;

class ReportesController extends Controller
{
    public function requisitos_tramite($servicio_id, $tipo_tramite)
    {
        $servicio = Servicio::select('tipo_servicio')
            ->where('id', $servicio_id)
            //->where('estado', 1)
            ->get();
        //return $servicio;
        $tramite = TipoTramite::select('nombre_tramite')
            ->where('id', $tipo_tramite)
            //->where('estado', 1)
            ->get();
        //return $tramite;
        $requisitos = Requisito::select('id', 'tramite', 'descripcion')
            ->where('servicio_id', $servicio_id)
            ->where('tipo_tramite_id', $tipo_tramite)
            ->where('estado', 1)->get();
        //return $requisitos;
        $prerequisitos = PreRequisito::select('grupo', 'descripcion')
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
        $requisitospdf = PDF::loadview('reportes.requisitosPDF', compact('servicio', 'tramite', 'requisitos', 'prerequisitos', 'unicos', 'fechahora'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    public function seguimiento_tramite($servicio_id, $tipo_tramite, $tramite_id)
    {
        // return $tramite_id;
        $presentados = Presentado::select('observacion', 'pre_requisito_id')->where('tramite_id', $tramite_id)->get();
        //return $presentados;
        $servicio = Servicio::select('tipo_servicio')
            ->where('id', $servicio_id)
            //->where('estado', 1)
            ->get();
        //return $servicio;
        $tramite = TipoTramite::select('nombre_tramite')
            ->where('id', $tipo_tramite)
            //->where('estado', 1)
            ->get();
        //return $tramite;
        $requisitos = Requisito::select('id', 'tramite', 'descripcion')
            ->where('servicio_id', $servicio_id)
            ->where('tipo_tramite_id', $tipo_tramite)
            ->where('estado', 1)->get();
        //return $requisitos;
        $prerequisitos = PreRequisito::select('grupo', 'descripcion')
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
        $requisitospdf = PDF::loadview('reportes.seguimientoPDF', compact('servicio', 'tramite', 'requisitos', 'prerequisitos', 'unicos', 'fechahora', 'presentados'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    /*****************formulario solciitud******* */
    public function formulario_solicitud($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        //return $institucion;
        $user=User::find($institucion->user_id);
        //return $user;
        $fechahora = Carbon::now()->format('d/m/Y H:i:s');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        $requisitospdf = PDF::loadview('reportes.formulario_solicitud', compact('institucion', 'user','fechahora'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
    public function orden_trabajo($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        //return $institucion;
        $user=User::find($institucion->user_id);
        //return $user;
        $fechahora = Carbon::now();
        $masfecha = $fechahora->addDays(10)->format('Y-d-m');
        //return view('reportes.requisitosPDF',compact('servicio','tramite','requisitos','prerequisitos','unicos','fechahora'));
        $requisitospdf = PDF::loadview('reportes.orden_trabajo', compact('institucion', 'user','fechahora','masfecha'));
        $requisitospdf->setpaper("letter", "portrait"); //tamaño de papel y direccion vertical; landscape es horizontal
        return $requisitospdf->stream('requisitos.pdf'); //este comando, muestra el pdf en una ventana
    }
}
