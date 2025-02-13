<?php

namespace database\database\seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();




        //ROLES
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleNormal = Role::create(['name' => 'usuarioapp']);

        //Creamos un usuario con rol de administrador
        User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]
        )->assignRole($roleAdmin);
        $usuariosNormales = User::factory(50)->create();

        //Le establecemos el rol de usuario normal al resto
        foreach($usuariosNormales as $usuario) {
            $usuario->assignRole($roleNormal);
        }

    }
}
