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


        $rubrica = new Rubrica();
        $rubrica->user_id = auth()->id();  // Guarda el ID del usuario autenticado
        $rubrica->codigo = $request->codigo;
        $rubrica->titulo = $request->titulo;
        $rubrica->descripcion = $request->descripcion;
        $rubrica->claridad = $request->claridad;
        $rubrica->comentario = $request->comentario;
        $rubrica->num_preguntas = count($request->preguntas);  // Contamos las preguntas y guardamos el número
        $rubrica->preguntas = $request->preguntas;  // Laravel lo convierte automáticamente en JSON
        $rubrica->save();


        return redirect()->route('rubrica.create')->with('success', 'Rúbrica creada con éxito');
    }
}
