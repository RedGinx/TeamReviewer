@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Rúbrica: {{ $rubrica->titulo }}</h1>

        <p><strong>Código:</strong> {{ $rubrica->codigo }}</p>
        <p><strong>Descripción:</strong> {{ $rubrica->descripcion }}</p>
        <p><strong>Claridad:</strong> {{ $rubrica->claridad }}</p>
        <p><strong>Comentario:</strong> {{ $rubrica->comentario }}</p>
        <p><strong>Número de Preguntas:</strong> {{ $rubrica->num_preguntas }}</p>
        <p><strong>Preguntas:</strong> {{ $rubrica->preguntas }}</p>

        <a href="{{ route('rubricas.edit', $rubrica) }}" class="btn btn-warning">Editar</a>
        <a href="{{ route('rubricas.index') }}" class="btn btn-secondary">Volver a la lista</a>
    </div>
@endsection
