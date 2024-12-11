<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscalaSancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $servicios = [
            'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 1,
            'EMPRESAS DE VIAJES Y TURISMO' => 2,
            'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 3,
            'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO' => 4,
            'GUIAS DE TURISMO' => 5,
            'SERVICIOS GASTRONOMICOS TURISTICOS' => 6,
        ];

        // Datos de sanciones
        $sanciones = [
            ['tipo_sancion' => 'INFRACCIÓN LEVE', 'ajuste_sancion' => 'APERCIBIMIENTO ESCRITO'],
            ['tipo_sancion' => 'INFRACCIÓN 1º GRAVE', 'ajuste_sancion' => 'UN SALARIO MÍNIMO'],
            ['tipo_sancion' => 'INFRACCIÓN 2º GRAVE', 'ajuste_sancion' => 'UN SALARIO Y MEDIO MÍNIMO'],
            ['tipo_sancion' => 'INFRACCIÓN 3º GRAVE', 'ajuste_sancion' => 'DOS SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'INFRACCIÓN 4º GRAVE', 'ajuste_sancion' => 'DOS Y MEDIO SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'INFRACCIÓN 1º MUY GRAVE', 'ajuste_sancion' => 'TRES SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'INFRACCIÓN 2º MUY GRAVE', 'ajuste_sancion' => 'TRES Y MEDIO SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'INFRACCIÓN 3º MUY GRAVE', 'ajuste_sancion' => 'CUATRO SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'INFRACCIÓN 4º MUY GRAVE', 'ajuste_sancion' => 'CUATRO Y MEDIO SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'RUPTURA DE PRECINTO DE CLAUSURA', 'ajuste_sancion' => 'CINCO SALARIOS MÍNIMOS'],
            ['tipo_sancion' => 'SUSPENSIÓN TEMPORAL', 'ajuste_sancion' => 'NO SUPERIOR A 3 MESES'],
            ['tipo_sancion' => 'CLAUSURA DEFINITIVA Y REVOCACIÓN DE LA PLACA Y LICENCIA TURÍSTICA', 'ajuste_sancion' => 'CIERRE DEFINITIVO Y BAJA DE LA PLATAFORMA INFORMÁTICA DEL SIRETUR'],
        ];

        // Insertamos los datos en la tabla
        foreach ($sanciones as $sancion) {
            foreach ($servicios as $servicio => $servicioId) {
                DB::table('escala_sanciones')->insert([
                    'tipo_sancion' => $sancion['tipo_sancion'],
                    'ajuste_sancion' => $sancion['ajuste_sancion'],
                    'servicio_id' => $servicioId,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
        }
    }
}
