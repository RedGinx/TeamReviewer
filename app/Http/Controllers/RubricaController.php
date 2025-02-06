<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

class RubricaController extends Controller
{
    // Mostrar el formulario
    public function mostrarFormulario()
    {
        return view('rubrica');
    }

    // Guardar la rúbrica en el archivo JSON
    public function guardarRubrica(Request $request)
    {
        // Obtener los datos del formulario
        $titulo = $request->input('titulo');
        $argumentos = $request->input('argumentos');

        // Ruta del archivo JSON donde se almacenan las rúbricas
        $archivoJson = storage_path('app/rubricas.json');

        // Comprobar si el archivo JSON existe
        if (file_exists($archivoJson)) {
            // Leer las rúbricas existentes
            $rubricas = json_decode(file_get_contents($archivoJson), true);
        } else {
            // Si no existe el archivo, inicializamos un array vacío
            $rubricas = [];
        }

        // Agregar la nueva rúbrica
        $rubricas[] = [
            'titulo' => $titulo,
            'argumentos' => $argumentos
        ];

        // Guardar las rúbricas de nuevo en el archivo JSON
        if (file_put_contents($archivoJson, json_encode($rubricas, JSON_PRETTY_PRINT)) === false) {
            return response()->json(['error' => 'No se pudo guardar el archivo JSON.'], 500);
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('rubrica.guardar')->with('success', 'Rúbrica guardada con éxito.');
    }
}
