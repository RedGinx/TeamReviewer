<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RubricaJsonController extends Controller
{
    public function show()
    {
        // Simulación de datos JSON
        $jsonData = json_encode([
            ['titulo' => 'Primer Título', 'descripcion' => 'Esta es la primera descripción.'],
            ['titulo' => 'Segundo Título', 'descripcion' => 'Aquí va la segunda descripción.'],
        ]);

        // Decodificar JSON a array
        $data = json_decode($jsonData, true);

        return view('json-view', compact('data'));
    }
}
