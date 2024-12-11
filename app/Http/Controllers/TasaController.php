<?php

namespace App\Http\Controllers;

use App\Models\Tasa;
use Illuminate\Http\Request;

class TasaController extends Controller
{
    public function obtenerTasas(Request $request)
    {
        $servicioId = $request->get('servicio_id');
        $tipoServicioId = $request->get('tipo_servicio_id');
        $categoriaId = $request->get('categoria_id');

        // Filtrar las tasas donde identificador es igual a 1
        $query = Tasa::where('identificador', 1);

        if ($servicioId) {
            $query->where('servicio_id', $servicioId);
        }

        if ($tipoServicioId) {
            $query->where('tipo_servicio_id', $tipoServicioId);
        }

        if ($categoriaId) {
            $query->where('categoria_id', $categoriaId);
        }

        $tasas = $query->get();

        // Devolver las tasas en formato JSON
        return response()->json($tasas);
    }
}
