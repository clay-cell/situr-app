<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $servicio = [
        ['tipo_servicio' => 'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['tipo_servicio' => 'EMPRESAS DE VIAJES Y TURISMO', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['tipo_servicio' => 'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['tipo_servicio' => 'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['tipo_servicio' => 'GUIAS DE TURISMO', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['tipo_servicio' => 'SERVICIOS GASTRONOMICOS TURISTICOS', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
      ];
      DB::table('servicios')->insert($servicio);
    }
}
