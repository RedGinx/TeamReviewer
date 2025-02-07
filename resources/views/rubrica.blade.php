@extends('layouts.app')

@section('title', 'Crear Rúbrica')

@section('content')
    <div class="card">
        <div class="card-header">Crear Nueva Rúbrica</div>
        <div class="card-body">
            <form action="{{ route('rubrica.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre de la Rúbrica</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="mb-3">
                    <label for="criterios" class="form-label">Criterios de Evaluación (separados por comas)</label>
                    <textarea class="form-control" id="criterios" name="criterios" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="puntuacion_maxima" class="form-label">Puntuación Máxima</label>
                    <input type="number" class="form-control" id="puntuacion_maxima" name="puntuacion_maxima" required>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Rúbrica</button>
            </form>
        </div>
    </div>
@endsection
