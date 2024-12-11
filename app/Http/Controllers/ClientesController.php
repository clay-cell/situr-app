<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Institucion;
use App\Models\InstitucionCliente;
use App\Models\Pais;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ClientesController extends Controller
{

    public function show(string $id)
    {
        //
        $institucion = Institucion::find($id);
        if (!$institucion) {
            return view('error404');
        }
        return view('clientes.mostrar_clientes', compact('institucion'));
    }
    public function create($id)
    {
        $institucion = Institucion::find($id);
        $pais = Pais::all();
        if (!$institucion) {
            return view('error404');
        }
        return view('clientes.registro_clientes', compact('institucion', 'pais'));
    }
    public function store(Request $request, $id)
    {
        try {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'paterno' => 'nullable|string|max:255',
                'materno' => 'nullable|string|max:255',
                'identificacion' => 'required|string|max:255',
                'expedido' => 'required|string|max:255',
                'pdf' => 'required|mimes:pdf|max:2048',
                'fecha_ingreso' => 'required|date',
                'hora_entrada' => 'required|date_format:H:i',
                'pais_id' => 'required|numeric'
            ]);

            $institucion = Institucion::find($id);
            if (!$institucion) {
                return view('error404');
            }

            DB::transaction(function () use ($request, $institucion) {
                Carbon::setLocale('es'); // Configurar a español
                // Verificar si el cliente ya existe
                $clientes = Cliente::where('identificacion', $request->identificacion)->first();

                if (!$clientes) {
                    // Crear el cliente si no existe
                    $clientes = new Cliente();
                    $clientes->nombres = ucwords(strtolower($request->nombres));
                    $clientes->paterno = ucwords(strtolower($request->paterno));
                    $clientes->materno = ucwords(strtolower($request->materno));
                    $clientes->identificacion = $request->identificacion;
                    $clientes->expedido = strtoupper($request->expedido);
                    if ($request->pais_id == 1) {
                        $clientes->nacionalidad = true;
                    } else {
                        $clientes->nacionalidad = false;
                    }
                    $clientes->pais_id = $request->pais_id;
                    // Procesar y almacenar el archivo PDF
                    if ($request->hasFile('pdf')) {
                        $identificacion = $request->identificacion;
                        $fechaHoy = Carbon::now()->format('Y-m-d'); // Formato de fecha

                        // Crear el nombre del archivo con el formato deseado
                        $fileName = "{$identificacion}_{$fechaHoy}_{$institucion->nombre}.pdf";
                        $filePath = "clientes/" . $fileName;

                        // Guardar el archivo directamente en 'public/clientes'
                        $request->file('pdf')->move(public_path("clientes"), $fileName);

                        // Guardar la ruta relativa en la base de datos para acceso directo
                        $clientes->pdf = $filePath;
                    }

                    $clientes->save();
                }

                // Crear el registro en InstitucionCliente
                $institucion_cliente = new InstitucionCliente();
                $institucion_cliente->fecha_ingreso = $request->fecha_ingreso;
                $institucion_cliente->hora_entrada = $request->hora_entrada;
                $institucion_cliente->gestion = carbon::now()->year;
                $institucion_cliente->mes = ucwords(strtolower(Carbon::now()->translatedFormat('F'))); // 'diciembre'
                $institucion_cliente->estadia = 0; // 'diciembre'


                // 'diciembre'
                $institucion_cliente->cliente_id = $clientes->id; // $clientes ya existe
                $institucion_cliente->institucion_id = $institucion->id;
                $institucion_cliente->save();
            });
            return redirect()->route('clientes.show', $institucion->id)->with('success', 'Cliente registrado Exitosamente');
        } catch (ValidationException $e) {
            // return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }
    public function salida($id)
    {
        $salida = InstitucionCliente::find($id);
        if (!$salida) {
            return view('error404');
        }

        // Obtener la fecha actual
        $fechaActual = Carbon::now()->toDateString();

        // Actualizar la fecha y hora de salida
        $salida->fecha_salida = $fechaActual; // Solo la fecha
        $salida->hora_salida = Carbon::now()->toTimeString(); // Solo la hora

        // Verificar si la fecha de salida es igual a la fecha actual
        if ($salida->fecha_salida === $fechaActual) {
            $salida->estadia = 1; // Estadia activa
        } else {
            $salida->estadia = 2; // Estadia no activa
        }

        // Guardar los cambios en la base de datos
        $salida->save();

        return redirect()->back()->with('success', 'El cliente acaba de salir!');
    }
}
