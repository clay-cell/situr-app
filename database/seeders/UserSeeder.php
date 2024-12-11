<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Juan Perez',
            'primer_apellido' => 'Perez',
            'segundo_apellido' => 'Lopez',
            'nacionalidad' => 'Boliviana',
            'cedula' => '123456789',
            'extension' => '1234',
            'direccion' => 'Calle Ficticia 123',
            'ciudad' => 'Cochabamba',
            'email' => 'cm0266210@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Usa una contraseña segura
            'telefono' => '74123456',
            'celular' => '78901234',
            'lugar_nacimiento' => 'Cochabamba',
            'fecha_nacimiento' => '1990-01-01',
            'estado' => 1, // Activo
            'sexo' => 'V', // O 'Femenino', según el caso
        ]);
        // Asignar el rol "admin" (o cualquier rol que tengas definido)
        $user->assignRole('Administrador'); // Asegúrate de que el rol "admin" esté creado previamente
    }
}
