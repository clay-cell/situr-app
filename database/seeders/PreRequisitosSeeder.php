<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PreRequisitosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      $prerequisito = [
        /*OBTENCION DE LICENCIA TURISTICA*/
        /*['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS ESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  1, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],*/

        /***************viajes **********/
        ['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS ESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  2, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        /***************TRANSPORTE TURISTICO EXCLUSIVO **********/
        ['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS ESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  3, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        /***************ORGANIZADORAS DE CONGRESOS Y FERIAS DE TURISMO **********/
        ['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS EESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  4, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        /***************GUIAS DE TURISMO **********/
        ['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS EESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  5, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],

        /***************SERVICIOS GASTRONOMICOS TURISTICOS **********/
        ['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS EESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        /**********RENOVACION */
        /*['descripcion' => 'REQUISITOS ADMINISTRATIVOS','estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS LEGALES','estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'REQUISITOS EESPECIFICOS Y TECNICOS', 'estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ['descripcion' => 'SIRETUR', 'estado' => true,'requisito_id' =>  6, 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],*/
      ];
      DB::table('pre_requisitos')->insert($prerequisito);
    }
}
