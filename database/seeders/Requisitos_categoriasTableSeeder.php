<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Requisitos_categoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $categorias = [
            //HOTELES
            '5 Estrellas' => 1,
            '4 Estrellas' => 2,
            '3 Estrellas' => 3,
            '2 Estrellas' => 4,
            '1 Estrella' => 5,
            //HOTELES BOUTIQUE
            '5 Estrellas' => 6,
            '4 Estrellas' => 7,
            //RESORTS
            '5 Estrellas' => 8,
            '4 Estrellas' => 9,
            '3 Estrellas' => 10,
            //APART HOTELES
            '5 Estrellas' => 11,
            '4 Estrellas' => 12,
            '3 Estrellas' => 13,
            //LODGE
            'Única' => 14,
            //HOTELES RURALES
            'Única' => 15,
            //HOSTALES Y/O RESIDENCIALES
            'Tres Estrellas' => 16,
            'Dos Estrellas' => 17,
            'Una Estrella' => 18,
            //HOSTERIA
            'Única' => 19,
            //ALOJAMIENTOS
            'Alojamiento A' => 20,
            'Alojamiento B' => 21,
            //AREAS CAMPING
            'Única' => 22,
            //AGENCIAS DE VIAJE
            'Única' => 23,
            //CONSOLIDADORAS
            'Única' => 24,
            //MAYORISTAS Y REPRESENTACIONES
            'Única' => 25,
            //OPERADORAS DE TURISMO
            'Única' => 26,
            //GUÍAS DE TURISMO
            'Única' => 27,
            'Única' => 28,
            'Única' => 29,
            'Única' => 30,
            'Única' => 31,
            'Única' => 32,
            'Única' => 33,
            'Única' => 34,
            'Única' => 35,
            'Única' => 36,
            //gastronomia
            'Cinco Tenedores' => 37,
            'Cuatro Tenedores' => 38,
            'Tres Tenedores' => 39,
            'Dos Tenedores' => 40,
            'Un Tenedor' => 41,
            // TRANSPORTE
            'Única' => 42,
            'Única' => 43,
            'Única' => 44,
            'Única' => 45,
        ];
        $requisito_categorias = [
            /*****************HOTELES***************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /***************HOTELES BOUTIQUE**************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*****************RESORT***************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'UNIDADES COMPLEMENTARIAS',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'VI.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*****************APART HOTELES***************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*****************LODGE********************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 14,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*****************HOTELES RURALES********************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 15,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*****************HOSTALES Y/O RESIDENCIALES********************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 16,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*********************************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 17,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*********************************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 18,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*********************HOSTERIA********************************* */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 19,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /*********************ALOJAMIENTOS********************************* */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 20,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'UNIDADES HABITACIONALES',
                'categoria_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'V.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 21,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // AREAS CAMPING
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'EXTERIORES',
                'categoria_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'INTERIORES',
                'categoria_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'SEÑALETICA',
                'categoria_id' => 22,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // AGENCIAS DE VIAJE
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 23,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            // CONSOLIDADORAS
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 24,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //MAYORISTAS Y REPRESENTACIONES
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 25,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //OPERADORAS DE TURISMO
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 26,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            //GUÍAS DE TURISMO
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 27,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 28,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 29,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 30,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 31,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 32,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 33,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 34,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 35,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 36,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
              // GASTRONOMIA
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'INFRAESTRUCTURA Y EQUIPAMIENTO',
                'categoria_id' => 37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'SERVICIOS',
                'categoria_id' => 37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'ÁREA DEL ESTABLECIMIENTO BASICO',
                'categoria_id' => 37,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 38,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'INFRAESTRUCTURA Y EQUIPAMIENTO',
                'categoria_id' => 38,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'SERVICIOS',
                'categoria_id' => 38,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'ÁREA DEL ESTABLECIMIENTO BASICO',
                'categoria_id' => 38,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 39,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'INFRAESTRUCTURA Y EQUIPAMIENTO',
                'categoria_id' => 39,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'SERVICIOS',
                'categoria_id' => 39,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'ÁREA DEL ESTABLECIMIENTO BASICO',
                'categoria_id' => 39,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'INFRAESTRUCTURA Y EQUIPAMIENTO',
                'categoria_id' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'SERVICIOS',
                'categoria_id' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'ÁREA DEL ESTABLECIMIENTO BASICO',
                'categoria_id' => 40,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 41,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'II.',
                'nombre' => 'INFRAESTRUCTURA Y EQUIPAMIENTO',
                'categoria_id' => 41,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'III.',
                'nombre' => 'SERVICIOS',
                'categoria_id' => 41,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'IV.',
                'nombre' => 'ÁREA DEL ESTABLECIMIENTO BASICO',
                'categoria_id' => 41,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
              // TRANSPORTE
            /**************************************** */
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 42,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 43,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 44,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'codigo' => 'I.',
                'nombre' => 'CARACTERÍSTICAS GENERALES',
                'categoria_id' => 45,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],

        ];
        DB::table('requisito_categorias')->insert(values: $requisito_categorias);
    }
}
