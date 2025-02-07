@extends('layouts.app')

@section('title', 'Crear Ejercicio')

@section('content')
    <div class="card">
        <div class="card-header">Crear Nuevo Ejercicio</div>
        <div class="card-body">
            <form action="{{ route('ejercicio.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="titulo" class="form-label">Título del Ejercicio</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="rubrica_id" class="form-label">Seleccionar Rúbrica</label>
                    <select class="form-control" id="rubrica_id" name="rubrica_id" required>
                        @foreach ($rubricas as $rubrica)
                            <option value="{{ $rubrica->id }}">{{ $rubrica->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Guardar Ejercicio</button>
            </form>
        </div>
    </div>
@endsection
