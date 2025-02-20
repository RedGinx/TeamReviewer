<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Crear roles si no existen
        $profesorRole = Role::firstOrCreate(['name' => 'profesor']);
        $alumnoRole = Role::firstOrCreate(['name' => 'alumno']);

        // Crear 10 usuarios
        foreach (range(1, 10) as $index) {
            $user = User::create([
                'name' => "Usuario $index",
                'email' => "usuario$index@example.com",
                'password' => bcrypt('password'), // Asegúrate de usar una contraseña segura
            ]);

            // Asignar roles de manera alternada
            if ($index % 2 == 0) {
                $user->assignRole($profesorRole);
            } else {
                $user->assignRole($alumnoRole);
            }
        }
    }
}
