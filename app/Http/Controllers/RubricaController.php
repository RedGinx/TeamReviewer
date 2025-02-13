<?php

namespace App\Http\Controllers;

use App\Models\Rubrica;
use Illuminate\Http\Request;

class RubricaController extends Controller
{
    public function create()
    {
        return view('rubrica');  // Aquí carga la vista con el formulario
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo' => 'required|unique:rubricas,codigo',
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'claridad' => 'required|boolean',
            'comentario' => 'required|boolean',
            'preguntas' => 'required|array',
            'preguntas.*.pregunta' => 'required|string|max:255',
            'preguntas.*.puntuacion' => 'required|integer|min:0',
        ]);

        // Crear la nueva rúbrica
        $rubrica = new Rubrica();
        $rubrica->codigo = $request->codigo;
        $rubrica->titulo = $request->titulo;
        $rubrica->descripcion = $request->descripcion;
        $rubrica->claridad = $request->claridad;
        $rubrica->comentario = $request->comentario;
        $rubrica->preguntas = $request->preguntas;  // Almacenar las preguntas como JSON
        $rubrica->save();

        return redirect()->route('rubrica.create')->with('success', 'Rúbrica creada con éxito');
    }
}
