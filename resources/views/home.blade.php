@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p>{{ __('You are logged in!') }}</p>

                        <div class="d-flex justify-content-around mt-3">
                            <a href="{{ route('rubrica.create') }}" class="btn btn-primary">Crear Rúbrica</a>
                            <a href="{{ route('ejercicio.create') }}" class="btn btn-success">Crear Ejercicio</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
