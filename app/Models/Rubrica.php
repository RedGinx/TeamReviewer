<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class  Rubrica extends Model
{
    use HasFactory;

    protected $fillable = ['codigo', 'titulo', 'descripcion', 'preguntas', 'claridad', 'comentario', 'preguntas'];

    protected $casts = [
        'preguntas' => 'array',
    ];

}

