<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Asignar un rol a un usuario.
     */
    public function assignRoleToUser(Request $request, $userId)
    {
        // Validar que el rol exista en la base de datos
        $request->validate([
            'role' => 'required|string|exists:roles,name'
        ]);

        // Buscar el usuario
        $user = User::findOrFail($userId);

        // Asignar el rol
        $user->assignRole($request->input('role'));

        return response()->json(['message' => "Rol '{$request->input('role')}' asignado a {$user->name}"]);
    }
}
