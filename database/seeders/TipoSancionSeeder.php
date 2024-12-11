<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSancionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tiposSanciones = [
            ['tipo_sancion' => 'INFRACCION LEVE','created_at' => now(), 'updated_at' => now()],
            ['tipo_sancion' => 'INFRACCION GRAVE', 'created_at' => now(), 'updated_at' => now()],
            ['tipo_sancion' => 'INFRACCION MUY GRAVE','created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('sanciones')->insert($tiposSanciones);
    }
}
