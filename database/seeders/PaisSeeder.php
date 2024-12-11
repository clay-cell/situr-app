<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $paises = [
            'BOLIVIA', 'ARGENTINA', 'BRAZIL', 'COLOMBIA', 'CHILE',
            'ECUADOR', 'PARAGUAY', 'PERU', 'URUGUAY', 'VENEZUELA',
            'MEXICO', 'CANADA', 'EEUU', 'ALEMANIA', 'ESPAÑA',
            'FRANCIA', 'INGLATERRA', 'ITALIA', 'SUIZA', 'HOLANDA',
            'SUECIA', 'JAPON', 'ISRAEL', 'OCEANIA', 'AFRICA'
        ];

        foreach ($paises as $pais) {
            DB::table('pais')->insert([
                'pais' => $pais,
                'estado' => true, // Valor predeterminado
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
