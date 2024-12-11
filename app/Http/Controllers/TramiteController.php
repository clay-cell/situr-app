<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Presentado;
use App\Models\Requisito;
use App\Models\Seguimiento;
use App\Models\TipoTramite;
use App\Models\Tramite;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; //
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function create($eid, $tid)
    {
        //return $eid.' '.$tid;
        //return Crypt::decrypt($eid).' '.Crypt::decrypt($tid);

        $user_id = Auth::user()->id;
        //buscando la relacion entre el usuario y el establecimiento;
        $n_establecimiento = Institucion::where('id', $eid)->where('user_id', $user_id)->count();
        $busqueda_tipotramite = TipoTramite::where('id', $tid)->count();
        $tipotramite = TipoTramite::where('id', $tid)->first();
        if ($n_establecimiento == 0 || $busqueda_tipotramite == 0) {
            return view('error404');
        }
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        //return $servicio;
        $requisito = Requisito::select('id')->where('tipo_tramite_id', $tid)->where('servicio_id', $servicio[0]->id)->get();
        //return $establecimiento[0]->nombre;
        $ntramite = Tramite::where('estado', 0)->where('institucion_id', $eid)->where('servicio_id', $servicio[0]->id)->where('requisito_id', $requisito[0]->id)->count();
        //return $ntramite;
        if ($ntramite == 0) {
            $datosTramite = new Tramite();
            $datosTramite->fecha_inicio = Carbon::now()->format('Y-m-d');
            $datosTramite->observacion = 'ingresado';
            $datosTramite->user_id = Auth::user()->id;
            $datosTramite->servicio_id = $establecimiento[0]->servicio_id;
            $datosTramite->institucion_id = $establecimiento[0]->id;
            $datosTramite->tipotramite_id = $tipotramite->id;
            $datosTramite->requisito_id = $requisito[0]->id;
            $datosTramite->save();
        }
        $titulo = 'Registro de requisitos';
        $tramite = Tramite::select('id')->where('estado', 0)->where('institucion_id', $eid)->where('servicio_id', $servicio[0]->id)->where('requisito_id', $requisito[0]->id)->get();
        //return $tramite;
        return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid', 'titulo', 'tramite'));
    }
    public function show($eid, $tid)
    {
        //return $eid." ".$tid;
        /*$presentados=Presentado::select('item_prerequisito_id','observacion')
      ->where('tramite_id',9)
      ->get();
        return $presentados;*/


        $user_id = Auth::user()->id;
        //$tramite = Tramite::where('user_id', Auth::user()->id)->first();
        //$tramite = Tramite::where('id', $tid)->first();

        //return $tramite;
        //buscando la relacion entre el usuario y el establecimiento;
        $n_establecimiento = Institucion::where('id', $eid)->where('user_id', $user_id)->count();
        if ($n_establecimiento == 0) {
            return view('error404');
        }
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        //return $establecimiento;
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        //return $establecimiento[0]->nombre;
        //return $servicio;
        $titulo = 'Registro de requisitos';
        $requisito = Requisito::select('id')->where('tipo_tramite_id', $tid)->where('servicio_id', $servicio[0]->id)->get();
        //return $requisito;
        $tramite = Tramite::select('id')
            ->where('estado', 0)->where('institucion_id', $eid)
            ->where('servicio_id', $servicio[0]->id)
            ->where('requisito_id', $requisito[0]->id)
            ->get();
        //return $tramite;
        return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid', 'tramite', 'titulo'));
    }

    public function revisar_tramite($eid, $tid)
    {
        //return $eid.$tid;
        //$tramite = Tramite::where('id', $tid)->first();
        //return $tramite;
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        //return $establecimiento[0]->nombre;
        //return $n_tramite;
        $requisito = Requisito::select('id')->where('tipo_tramite_id', $tid)->where('servicio_id', $servicio[0]->id)->get();
        //return $requisito;
        $tramite = Tramite::select('id')
            ->where('estado', 0)->where('institucion_id', $eid)
            ->where('servicio_id', $servicio[0]->id)
            ->where('requisito_id', $requisito[0]->id)
            ->get();
        //return $tramite;
        $titulo = 'Revision de requisitos';
        return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid', 'tramite', 'titulo'));
    }

    public function show_new()
    {
        return view('tramites.tramites_ingresados');
    }
    public function show_process()
    {
        return view('tramites.tramites_proceso');
    }
    public function show_finished()
    {
        return view('tramites.tramites_culminados');
    }
    public function seguimiento_tramite($eid, $ttid)
    {
        //return $eid.$ttid;
        $tipotramite = TipoTramite::where('id', $ttid)->first();
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        $requisito = Requisito::select('id')->where('tipo_tramite_id', $ttid)->where('servicio_id', $servicio[0]->id)->get();
        $tramite = Tramite::select('id')
            ->where('estado', 0)->where('institucion_id', $eid)
            ->where('servicio_id', $servicio[0]->id)
            ->where('requisito_id', $requisito[0]->id)
            ->get();
        //return $tramite;
        $titulo = 'Seguimiento de tramite';
        $seguimiento = Seguimiento::select('id', 'fecha_inicio', 'observacion', 'instancia', 'fecha_fin')
            ->where('tramite_id', $tramite[0]->id)
            ->orderBy('created_at', 'desc')
            ->get();
        //return $seguimiento;
        return view('tramites.tramites_seguimiento', compact('establecimiento', 'servicio', 'eid', 'ttid', 'tramite', 'titulo', 'seguimiento'));
    }
    public function documentos_tramite($tramite_id)
    {
        $tramites = Tramite::find($tramite_id);
        if (!$tramites) {
            return view('error404');
        }
        return view('documento_tramites.subir_documentos', compact('tramites'));
    }
}
