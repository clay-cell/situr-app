<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $role1 = Role::create(['name' => 'Administrador']);
        $role2 = Role::create(['name' => 'Contribuyente']);

        //PERMISOS
        $permission = Permission::create(['name' => 'Gestion_usuarios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Dashboard'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Prestadores_servicio'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Servicios'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Tipo_tramite'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Categorias'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Tipo_institucion'])->syncRoles([$role1]);
        $permission = Permission::create(['name' => 'Mis_instituciones'])->syncRoles([$role2]);
        // Asignar el rol de Administrador al usuario con ID 1
        $user = User::find(1); // Encuentra al usuario con ID 1
        if ($user) {
            $user->assignRole($role1); // Asigna el rol de Administrador
        }
    }
}
