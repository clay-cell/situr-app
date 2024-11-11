<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Institucion;
use App\Models\InstitucionCliente;
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
        if(!$institucion){
            return view('error404');
        }
        return view('clientes.mostrar_clientes',compact('institucion'));
    }
    public function create($id){
        $institucion = Institucion::find($id);
        if(!$institucion){
            return view('error404');
        }
        return view('clientes.registro_clientes',compact('institucion'));
    }
    public function store(Request $request, $id) {
        try {
            $request->validate([
                'nombres' => 'required|string|max:255',
                'paterno' => 'nullable|string|max:255',
                'materno' => 'nullable|string|max:255',
                'identificacion' => 'required|string|max:255|unique:clientes.identificacion',
                'expedido' => 'required|string|max:255',
                'pdf' => 'required|mimes:pdf|max:2048',
                'fecha_ingreso' => 'required|date',
                'hora_entrada' => 'required|date_format:H:i',
            ]);

            $institucion = Institucion::find($id);

            DB::transaction(function () use ($request, $institucion) {
                // Verificar si el cliente ya existe
                $clientes = Cliente::where('identificacion', $request->identificacion)->first();
                $institucion_cliente = new InstitucionCliente();
                $institucion_cliente->fecha_ingreso = $request->fecha_ingreso;
                $institucion_cliente->hora_entrada = $request->hora_entrada;
                $institucion_cliente->cliente_id = $clientes->id;
                $institucion_cliente->institucion_id = $institucion->id;
                $institucion_cliente->save();

                if (!$clientes) {
                    // Crear el cliente si no existe
                    $cliente = new Cliente();
                    $cliente->nombres = ucwords(strtolower($request->nombres));
                    $cliente->paterno = ucwords(strtolower($request->paterno));
                    $cliente->materno = ucwords(strtolower($request->materno));
                    $cliente->identificacion = $request->identificacion;
                    $cliente->expedido = strtoupper($request->expedido);

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
                        $cliente->pdf = $filePath;
                    }
                    $cliente->save();
                    $datos_cliente = Cliente::where('identificacion',$request->identificacion)->first();
                    $institucion_cliente->cliente_id = $datos_cliente->id;
                    $institucion_cliente->fecha_ingreso = $request->fecha_ingreso;
                    $institucion_cliente->hora_entrada = $request->hora_entrada;
                    $institucion_cliente->institucion_id = $institucion->id;
                    $institucion_cliente->save();
                }

            });
            return redirect()->route('clientes.show',$institucion->id)->with('success','Cliente registrado Exitosamente');
        } catch (ValidationException $e) {
            // return $e;
            return redirect()->back()->withErrors($e->validator)->withInput();
        }
    }


}
