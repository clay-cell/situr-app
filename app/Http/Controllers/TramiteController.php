<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\Presentado;
/*use App\Models\TipoTramite;
use App\Models\Requisito;
use App\Models\PreRequisito;*/
use App\Models\Tramite;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;

class TramiteController extends Controller
{
    public function create($eid, $tid)
    {
        //return $eid.' '.$tid;}
        //return Crypt::decrypt($eid).' '.Crypt::decrypt($tid);
        $user_id = Auth::user()->id;
        //buscando la relacion entre el usuario y el establecimiento;
        $n_establecimiento = Institucion::where('id', $eid)->where('user_id', $user_id)->count();
        if ($n_establecimiento == 0) {
            return view('error404');
        }
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        //return $establecimiento[0]->nombre;
        $datosTramite = new Tramite();
        $datosTramite->fecha_inicio = Carbon::now()->format('Y-m-d');
        $datosTramite->user_id = Auth::user()->id;
        $datosTramite->servicio_id = $establecimiento[0]->servicio_id;
        $datosTramite->institucion_id = $establecimiento[0]->id;
        $datosTramite->tipotramite_id = $tid;
        $datosTramite->save();
        return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid'));
    }
    public function show($eid, $tid)
    {
      //return $eid." ".$tid;
      /*$eliminarPDF = Presentado::select('ruta')
      ->where('tramite_id',2)
      ->where('pre_requisito_id',4)
      ->get();*/

      $user_id = Auth::user()->id;
        //$tramite = Tramite::where('user_id', Auth::user()->id)->first();
        $tramite = Tramite::where('id', $tid)->first();
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
        //return $n_tramite;
        $titulo='Registro de requisitos';
        //return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid', 'n_tramite','titulo'));
        return view('tramites.registrar_requisitos', compact('establecimiento', 'servicio', 'eid', 'tid', 'tramite','titulo'));
    }

    public function revisar_tramite($eid, $tid)
    {
        //return $eid.$tid;
        $tramite = Tramite::where('id', $tid)->first();
        //return $tramite;
        $establecimiento = Institucion::select('id', 'nombre', 'telefono', 'email', 'servicio_id')
            ->where('id', $eid)->get();
        $servicio = Servicio::select('id', 'tipo_servicio')->where('id', $establecimiento[0]->servicio_id)->get();
        //return $establecimiento[0]->nombre;
        //return $n_tramite;
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

    /*public function subirdoc(Request $request)
    {
        try {
            //code...
            // Validar el archivo que se está subiendo
            $request->validate([
                'requisito_id' => 'required',
                'tramite_id' => 'required',
                'descripcion' => 'required',
                'documento' => 'required|file|mimes:pdf', // Validar que sea un archivo PDF y que no exceda los 2MB
            ]);

            // Crear una nueva instancia del modelo Presentado
            $presentados = new Presentado();

            // Asignar valores a los campos del modelo
            $presentados->gestion = Carbon::now()->year;
            $presentados->fecha_presentacion = now(); // O la fecha que necesites
            $presentados->documento = $request->descripcion; // Esto puede ser una descripción o nombre del archivo
            //$presentados->ruta = ''; // Inicialmente vacío, lo asignaremos más adelante
            $presentados->aceptado = 0;
            $presentados->tramite_id = $request->tramite_id;
            $presentados->pre_requisito_id = $request->requisito_id;

            // Manejar la subida del archivo
           // Handle carta_solicitud upload if provided
          // Manejar la subida del archivo
        if ($request->hasFile('documento') && $request->file('documento')->isValid()) {
            $file = $request->file('documento');
            // Generar el nombre del archivo
            $descripcionLimpia = preg_replace('/[^A-Za-z0-9]/', '', $request->descripcion); // Elimina todo excepto letras y números
            $filename = $descripcionLimpia . '_' . $request->tramite_id . '.' . $file->getClientOriginalExtension();

            // Definir la carpeta de destino en public/pdf
            $destination = public_path('pdf');
            // Mover el archivo a la carpeta destino
            $file->move($destination, $filename);
            // Guardar la ruta relativa en el modelo
            $presentados->ruta = 'pdf/' . $filename;
        } else {
            $presentados->ruta = null;
        }

            // Guardar el modelo en la base de datos
            $presentados->save();

            // Retornar una respuesta o redirigir a una vista
            return redirect()->back()->with('success',"Exito!!!!");
        } catch (ValidationException $e) {
            return $e;
            //return view('error404')->with($e->validator);
            //return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }*/
}
