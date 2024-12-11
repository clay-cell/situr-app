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
            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE HOSPEDAJE TURÍSTICO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE VIAJES Y TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE TRANSPORTE TURISTICO EXCLUSIVO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE GUIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE SERVICIOS GASTRONOMICOS TURISTICOS', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['OBTENCIÓN LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['SERVICIOS GASTRONOMICOS TURISTICOS'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            /******************RENOVACION DE LICENCIA ****************************** */

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE HOSPEDAJE TURÍSTICO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE VIAJES Y TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE TRANSPORTE TURISTICO EXCLUSIVO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE GUIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'REQUISITOS RENOVACIÓN LICENCIA TURÍSTICA DEPARTAMENTAL ESTABLECIMIENTOS DE SERVICIOS GASTRONOMICOS TURISTICOS', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['RENOVACIÓN DE LA LICENCIA TURÍSTICA DEPARTAMENTAL'], 'servicio_id' => $servicios['SERVICIOS GASTRONOMICOS TURISTICOS'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],




            /******************CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD ****************************** */

            ['descripcion' => 'REQUISITOS CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE HOSPEDAJE TURÍSTICO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['ESTABLECIMIENTOS DE HOSPEDAJE TURISTICO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE VIAJES Y TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['EMPRESAS DE VIAJES Y TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE TRANSPORTE TURISTICO EXCLUSIVO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['EMPRESAS DE TRANSPORTE TURISTICO EXCLUSIVO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['EMPRESAS ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE GUIAS DE TURISMO', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['GUIAS DE TURISMO'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

            ['descripcion' => 'CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD DE ESTABLECIMIENTOS DE SERVICIOS GASTRONOMICOS TURISTICOS', 'estado' => true, 'tipo_tramite_id' =>  $tipotramite['CESE DE ACTIVIDAD O BAJA DEFINITIVA DE ACTIVIDAD'], 'servicio_id' => $servicios['SERVICIOS GASTRONOMICOS TURISTICOS'], 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        ];
        DB::table('requisitos')->insert($requisito);
    }
}
