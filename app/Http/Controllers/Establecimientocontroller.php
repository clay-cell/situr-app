<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\TipoServicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Servicio;
use App\Models\Institucion;
use App\Models\Licencia;
use App\Models\Notificacion;
use App\Models\TipoTramite;
use App\Models\Tramite;
use App\Models\Requisito;
use Illuminate\Validation\ValidationException;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Facades\Storage;

class Establecimientocontroller extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        //$estab = Institucion::where('user_id', $userId)->get();
        $establecimientos = Institucion::select('institucions.*', 'licencias.id as licencias_id')
            ->where('user_id', $userId)
            ->leftJoin('servicios', 'institucions.servicio_id', 'servicios.id')
            ->leftJoin('licencias', 'institucions.id', 'licencias.institucion_id')
            ->get();
        return view('institucion.instituciones', compact('establecimientos'));
    }

    public function create()
    {
        $servicios = Servicio::all();
        $tiposServicios = TipoServicio::all();
        $categorias = Categoria::all();
        /*return view('institucion.registro_institucion', compact('servicios', 'tiposServicios', 'categorias'));*/
        return view('institucion.registro_institucion', compact('servicios'));
    }

    public function store(Request $request)
    {
        /*try {
            //code...
            $request->validate([
                'nombre' => 'required|max:200|unique:institucions,nombre',
                'email' => 'required|email|unique:institucions,email',
                'telefono' => 'required|regex:/^[0-9]{1,8}$/|max:8',
                'direccion' => 'required|max:255',
                'servicio_id' => 'required|exists:servicios,id',
                'tipo_servicio_id' => 'required|exists:tipo_servicios,id',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            $institucion = new Institucion();
            $institucion->nombre = ucwords(strtolower($request->nombre));
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
        } catch (ValidationException $e) {
            return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }*/
        /*try {
            // Validación de datos
            $request->validate([
                'nombre' => 'required|max:200|unique:institucions,nombre',
                'email' => 'required|email|unique:institucions,email',
                'telefono' => 'required|regex:/^[0-9]{1,8}$/|max:8',
                'direccion' => 'required|max:255',
                'servicio_id' => 'required|exists:servicios,id',
                'tipo_servicio_id' => 'required|exists:tipo_servicios,id',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            // Crear la nueva institución
            $institucion = new Institucion();
            $institucion->nombre = ucwords(strtolower($request->nombre));
            $institucion->email = $request->email;
            $institucion->telefono = $request->telefono;
            $institucion->direccion = $request->direccion;
            $institucion->servicio_id = $request->servicio_id;
            $institucion->tipo_servicio_id = $request->tipo_servicio_id;
            $institucion->categoria_id = $request->categoria_id;
            $institucion->fecha_actividad = now();  // Asignar la fecha actual
            $institucion->user_id = Auth::id();
            $institucion->save();

            // Generación del QR después de guardar la institución
            $dns = new DNS2D();
            $qrContent = route('institucion.mostrar', $institucion->nombre); // Generar la URL para acceder a la institución
            $qrImage = $dns->getBarcodePNG($qrContent, 'QRCODE'); // Generar la imagen del QR en formato PNG

            // Guardar el QR como un archivo en el disco
            $qrFilePath = 'qr_codes/instituciones/' . $institucion->id . '.png';
            Storage::disk('public')->put($qrFilePath, base64_decode($qrImage)); // Guardar la imagen en el directorio

            // Actualizar la institución con la ruta del QR
            $institucion->update(['qr' => $qrFilePath]);

            // Redirigir a la lista de instituciones con un mensaje de éxito
            return redirect()->route('establecimiento.index')->with('success', 'Establecimiento registrado exitosamente.');
        } catch (ValidationException $e) {
            // En caso de error en la validación, redirigir con los errores
            return redirect()->back()->withErrors($e->validator)->withInput();
        }*/
        try {
            // Validación de datos
            $request->validate([
                'nombre' => 'required|max:200|unique:institucions,nombre',
                'email' => 'required|email|unique:institucions,email',
                'telefono' => 'required|regex:/^[0-9]{1,8}$/|max:8',
                'direccion' => 'required|max:255',
                'servicio_id' => 'required|exists:servicios,id',
                'tipo_servicio_id' => 'required|exists:tipo_servicios,id',
                'categoria_id' => 'required|exists:categorias,id',
            ]);

            // Crear la nueva institución
            $institucion = new Institucion();
            $institucion->nombre = ucwords(strtolower($request->nombre));
            $institucion->email = $request->email;
            $institucion->telefono = $request->telefono;
            $institucion->direccion = $request->direccion;
            $institucion->servicio_id = $request->servicio_id;
            $institucion->tipo_servicio_id = $request->tipo_servicio_id;
            $institucion->categoria_id = $request->categoria_id;
            $institucion->fecha_actividad = now();
            $institucion->user_id = Auth::id();
            $institucion->save();

            // Generar el enlace
            $link = route('institucion.mostrar', $institucion->id); // Usar el ID para mayor precisión

            // Generación del QR
            $dns = new DNS2D();
            $qrImage = $dns->getBarcodePNG($link, 'QRCODE'); // Generar QR con el enlace

            // Guardar el QR como un archivo en el disco
            $qrFilePath = 'qr_codes/instituciones/' . $institucion->id . '.png';
            Storage::disk('public')->put($qrFilePath, base64_decode($qrImage));

            // Actualizar la institución con el QR y el enlace
            $institucion->update([
                'qr' => $qrFilePath,
                'enlace' => $link, // Guardar el enlace generado
            ]);

            // Redirigir a la lista de instituciones con un mensaje de éxito
            return redirect()->route('establecimiento.index')->with('success', 'Establecimiento registrado exitosamente.');
        } catch (ValidationException $e) {
            // En caso de error en la validación, redirigir con los errores
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }

    public function show($id)
    {
        //return $id;
        //verificar ruta
        $nestablecimiento = Institucion::where('id', $id)->count();
        if ($nestablecimiento == 0) {
            return view('error404');
        }
        //$establecimiento = Institucion::where('id',$id)->first(['id','nombre','telefono','direccion','email','estado','fecha_actividad']);
        //$establecimiento = Institucion::where('id',$id)->first();
        $establecimiento = Institucion::where('id', $id)->get();
        //return $establecimiento;
        $tipo_tramite = TipoTramite::select('id', 'nombre_tramite')->get();
        //return $tipo_tramite;
        $n_tramites = Tramite::where('institucion_id', $id)->count();
        //return $n_tramites;
        $tramite = Tramite::where('institucion_id', $id)->where('estado', 0)->get();
        //return $tramite;
        if ($n_tramites > 0) {
            //contando los tramites pendientes
            $tramites_pendientes = Tramite::where('institucion_id', $id)
                ->where('estado', 0)
                ->count();
            $requisito = Requisito::select('tipo_tramite_id')->where('id', $tramite[0]->requisito_id)->get();
            //return $requisito;
            //return $tramite[0]->tipotramite_id;
            return view('institucion.tramites_institucion', compact('establecimiento', 'tipo_tramite', 'n_tramites', 'tramites_pendientes', 'tramite', 'requisito'));
        } else {
            //return $tramite;
            return view('institucion.tramites_institucion', compact('establecimiento', 'tipo_tramite', 'n_tramites', 'tramite'));
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
    public function obtenerTiposServicio($servicioId)
    {
        // Obtén los tipos de servicio asociados al servicio seleccionado
        $tiposServicio = TipoServicio::where('servicio_id', $servicioId)->get();
        return response()->json($tiposServicio);
    }

    public function obtenerCategorias($tipoServicioId)
    {
        // Obtén las categorías asociadas al tipo de servicio seleccionado
        $categorias = Categoria::where('tipo_servicio_id', $tipoServicioId)->get();
        return response()->json($categorias);
    }
    public function instituciones()
    {
        return view('instituciones.mostrar_instituciones');
    }
    public function mostrar($id)
    {
        // Buscar la institución por ID
        $institucion = Institucion::select('institucions.*', 'users.name', 'users.primer_apellido', 'users.segundo_apellido')
            ->join('users', 'institucions.user_id', '=', 'users.id')
            ->where('institucions.id', $id)->first();
        if (!$institucion) {
            return view('error404');
        }
        //dd($institucion);
        //return $institucion;
        // Devolver la vista con los datos de la institución
        return view('institucion.mostrar', ['institucion' => $institucion]);
    }
}
