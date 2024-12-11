<?php

namespace App\Http\Controllers;

use App\Models\Institucion;
use App\Models\item_sancion;
use App\Models\sancion_institucion;
use App\Models\sanciones;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Sancion_InstitucionController extends Controller
{
    //
    public function index($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        if (!$institucion) {
            return view('error404');
        }
        return view('sanciones.mostrar_sanciones_insitituciones', compact('institucion'));
    }
    public function create($institucion_id)
    {
        $institucion = Institucion::find($institucion_id);
        if (!$institucion) {
            return view('error404');
        }
        $sancion = item_sancion::where('servicio_id', $institucion->servicio_id)->get();
        //return $sancion;
        $tipo_sancion = sanciones::all();
        return view('sanciones.asignacion_sancion', compact('institucion', 'sancion', 'tipo_sancion'));
    }
    public function store(Request $request, $institucion_id)
    {
        try {
            // Validar los datos entrantes
            $validated = $request->validate([
                'sanciones' => 'required|array',       // Debe ser un array
                'sanciones.*' => 'required'
                // Cada sanción debe existir en la base de datos
            ]);

            $sanciones = $validated['sanciones'];
            //return $sanciones;
            // Iterar sobre las sanciones seleccionadas
            foreach ($sanciones as $sancion_id) {
                $sancion_institucion = new sancion_institucion();
                $sancion_institucion->fecha_asignacion = Carbon::now(); // Fecha actual
                $sancion_institucion->item_sancion_id = (int)$sancion_id;         // ID de la sanción
                $sancion_institucion->institucion_id = $institucion_id; // ID de la institución
                $sancion_institucion->save();                           // Guardar en la base de datos
            }

            // Redirigir con un mensaje de éxito
            return redirect()->route('sancion_institucion.index', $institucion_id)
                ->with('success', 'Sanciones asignadas exitosamente.');
        } catch (ValidationException $e) {
            // Redirigir con errores de validación
            return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
}
