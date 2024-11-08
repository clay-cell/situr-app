<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RequisitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $servicios = [
        'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO' => 1,
        'EMPRESAS DE VIAJES Y TURISMO' => 2,
        'EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO' => 3,
        'EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO' => 4,
        'GUIAS DE TURISMO' => 5,
        'SERVICIOS GASTRONOMICOS TURISTICOS' => 6,
      ];
      $tipotramite = [
        'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL' => 1,
        'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL' => 2,
        'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD' => 3,
      ];
      $requisito = [
        ['tramite' => 'ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO','descripcion' => 'OBTENCIÓN DE LICENCIA', 'estado' => true,'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'],'servicio_id'=>$servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

      ];
      DB::table('requisitos')->insert($requisito);
    }
}