<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rubrica extends Model
{
    use HasFactory;

    // Definir qué campos pueden ser asignados masivamente
    protected $fillable = ['codigo', 'titulo', 'descripcion', 'claridad', 'comentario', 'num_preguntas', 'preguntas'];

    // Castear el campo 'preguntas' para que se maneje como un array automáticamente
    protected $casts = [
        'preguntas' => 'array',
    ];
}
