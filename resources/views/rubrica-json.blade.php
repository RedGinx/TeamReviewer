@extends('layouts.app')

@section('title', 'Lista de Rúbricas')

@section('content')
    <div class="card">
        <div class="card-header">Lista de Rúbricas</div>
        <div class="card-body">
            @foreach($data as $item)
                <div class="mb-3 p-3 border rounded">
                    <h5 class="fw-bold">
                        <a href="{{ route('rubrica.show', ['rubrica' => $item['id']]) }}" class="text-decoration-none">
                            {{ $item['titulo'] }}
                        </a>
                    </h5>
                    <p class="text-muted">{{ $item['descripcion'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection
