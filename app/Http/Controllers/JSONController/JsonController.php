<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JsonController extends Controller
{
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $numeroPreguntas = $request->input('numero_preguntas', 1); // Por defecto 1 si no se envía

        // Validar los campos generales
        $rules = [
            'codigo' => 'required',
            'titulo' => 'required|string',
            'descripcion' => 'required|string',
            ''
        ];

        // Agregar reglas dinámicas según el número de preguntas
        for ($i = 1; $i <= $numeroPreguntas; $i++) {
            $rules["argumento$i"] = 'required|string';
            $rules["puntuacion$i"] = 'required|numeric';
        }

        // Validar los datos del formulario
        $validatedData = $request->validate($rules);


        // Leer el archivo JSON existente o inicializar un array vacío
        $jsonFilePath = 'rubricas.json';
        $rubricas = [];
        if (Storage::exists($jsonFilePath)) {
            $rubricas = json_decode(Storage::get($jsonFilePath), true);
        }

        // Agregar los nuevos datos al array
        $rubricas[] = $validatedData;

        // Guardar los datos en el archivo JSON
        Storage::put($jsonFilePath, json_encode($rubricas, JSON_PRETTY_PRINT));

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Rúbrica guardada correctamente.');
    }
}
