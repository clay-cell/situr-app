<?php

namespace App\Http\Controllers;

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
      $establecimientos = Institucion::where('user_id',$userId)->get();
      //$tramite = Realiza::where();
      return view('institucion.instituciones', compact('establecimientos'));
    }
    public function create(){
      $servicios = Servicio::all();
      return view('institucion.registro_institucion',compact('servicios'));
    }
    public function store(Request $request)
    {
      //return $request;
      $request->validate([
        'nombre' => 'required|max:200|unique:institucions,nombre',
        'email' => 'required|email',
        'telefono' => "required|regex:/^[0-9]{1,8}$/|max:8",
        'direccion' => 'required|max:255',
      ]);
      $institucion = new Institucion();
      $institucion->nombre = ucwords(strtolower($request->nombre));
      $institucion->email = $request->email;
      $institucion->telefono = $request->telefono;
      $institucion->direccion = $request->direccion;
      $institucion->servicio_id = $request->servicio;
      $institucion->user_id = Auth::id();
      $institucion->save();
      //return redirect()->route('dashboard')->with('success', 'Establecimeinto Registrado Exitosamente');
      return redirect()->route('establecimiento.index');
    }
    public function show($id){
      //verificar ruta
     
      $nestablecimiento = Institucion::where('id',$id)->count();
      if($nestablecimiento==0){
        return view('error404');
      } 
      $establecimiento = Institucion::where('id',$id)->first();
      $tipo_tramite=TipoTramite::select('id','nombre_tramite')->get();
      $n_tramites= Tramite::where('institucion_id', $establecimiento->id)->count();
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
    }
}
