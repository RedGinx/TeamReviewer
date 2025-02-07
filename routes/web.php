<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\RubricaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function () {
    return '¡Hola desde Laravel!';
});

Route::get('/vista', function () {
    return view('mi-vista', ['nombre' => 'Juan']);
});


//OpenAI
Route::post('/generarRespuesta', [OpenAIController::class, 'generarRespuesta']);


// chat
Route::get('/chat', function () {
    return view('chat');
});



// routes/web.php
Route::get('/rubrica', [RubricaController::class, 'mostrarFormulario']);
Route::post('/rubrica/guardar', [RubricaController::class, 'guardarRubrica'])->name('rubrica.guardar');



Route::resource('rubrica', RubricaController::class);
Route::resource('ejercicio', EjercicioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
