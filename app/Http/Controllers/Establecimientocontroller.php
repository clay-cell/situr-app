<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;
use App\Models\Institucion;
use App\Models\TipoTramite;
use App\Models\Tramite;

class Establecimientocontroller extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $establecimientos = Institucion::where('user_id', $userId)->get();
        return view('institucion.instituciones', compact('establecimientos'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        $tiposServicios = TipoServicio::all();
        $categorias = Categoria::all();
        return view('institucion.registro_institucion', compact('servicios', 'tiposServicios', 'categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_comercial' => 'required|max:200|unique:institucions,nombre_comercial',
            'email' => 'required|email|unique:institucions,email',
            'telefono' => 'required|regex:/^[0-9]{1,8}$/|max:8',
            'direccion' => 'required|max:255',
            'servicio_id' => 'required|exists:servicios,id',
            'tipo_servicio_id' => 'required|exists:tipo_servicios,id',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $institucion = new Institucion();
        $institucion->nombre = ucwords(strtolower($request->nombre_comercial));
        $institucion->email = $request->email;
        $institucion->telefono = $request->telefono;
        $institucion->direccion = $request->direccion;
        $institucion->servicio_id = $request->servicio_id;
        $institucion->tipo_servicio_id = $request->tipo_servicio_id;
        $institucion->categoria_id = $request->categoria_id;
        $institucion->fecha_actividad = now();  // Asignar la fecha actual
        $institucion->user_id = Auth::id();
        $institucion->save();

        return redirect()->route('establecimiento.index')->with('success', 'Establecimiento registrado exitosamente.');
    }

    public function show($id){
        //return $id;
        //verificar ruta
        $nestablecimiento = Institucion::where('id',$id)->count();
        if($nestablecimiento==0){
          return view('error404');
        }
        //$establecimiento = Institucion::where('id',$id)->first(['id','nombre','telefono','direccion','email','estado','fecha_actividad']);
        $establecimiento = Institucion::where('id',$id)->first();
        //return $establecimiento;
        $tipo_tramite=TipoTramite::select('id','nombre_tramite')->get();
        //return $tipo_tramite;
        $n_tramites= Tramite::where('institucion_id', $establecimiento->id)->count();
        //return $n_tramites;
        if($n_tramites > 0){
          //contando los tramites pendientes
          $tramites_pendientes=Tramite::where('institucion_id',$establecimiento->id)
          ->where('estado',0)
          ->count();
          //recuperando datos del tramite pendiente
          $tramite=Tramite::where('institucion_id',$establecimiento->id)->where('estado',0)->get();
          //return $tramite[0]->tipotramite_id;
          return view('institucion.tramites_institucion',compact('establecimiento','tipo_tramite','n_tramites','tramites_pendientes','tramite'));
        }
        else{
          return view('institucion.tramites_institucion',compact('establecimiento','tipo_tramite','n_tramites','tramite'));
        }
      }
    /*public function show($id){
        //return $id;
        //verificar ruta
        $nestablecimiento = Institucion::where('id',$id)->count();
        if($nestablecimiento==0){
          return view('error404');
        }
        //$establecimiento = Institucion::where('id',$id)->first(['id','nombre','telefono','direccion','email','estado','fecha_actividad']);
        $establecimiento = Institucion::where('id',$id)->first();
        //return $establecimiento;
        $tipo_tramite=TipoTramite::select('id','nombre_tramite')->get();
        //return $tipo_tramite;
        $n_tramites= Tramite::where('institucion_id', $establecimiento->id)->count();
        //return $n_tramites;
        if($n_tramites > 0){
          //contando los tramites pendientes
          $tramites_pendientes=Tramite::where('institucion_id',$establecimiento->id)
          ->where('estado',0)
          ->count();
          //recuperando datos del tramite pendiente
          $tramite=Tramite::where('institucion_id',$establecimiento->id)->where('estado',0)->get();
          //return $tramite;
          return view('institucion.tramites_institucion',compact('establecimiento','tipo_tramite','n_tramites','tramites_pendientes','tramite'));
        }
        else{
          return view('institucion.tramites_institucion',compact('establecimiento','tipo_tramite','n_tramites'));
        }
      }*/
}
