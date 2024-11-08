<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TipoTramiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipotramite = [
            ['nombre_tramite' => 'OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre_tramite' => 'RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['nombre_tramite' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD', 'estado' => true, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
          ];
          DB::table('tipo_tramites')->insert($tipotramite);
    }
}
