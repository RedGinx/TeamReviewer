<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        Permission::create(['name' => 'crear posts']);
        Permission::create(['name' => 'editar posts']);
        Permission::create(['name' => 'borrar posts']);

        // Crear roles y asignar permisos
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo(['crear posts', 'editar posts', 'borrar posts']);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo(['crear posts', 'editar posts']);
    }
}
