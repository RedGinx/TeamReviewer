<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\RubricaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/saludo', function () {
    return '¡Hola desde Laravel!';
});

//OpenAI
Route::post('/generarRespuesta', [OpenAIController::class, 'generarRespuesta']);

// chat
Route::get('/chat', function () {
    return view('chat');
});

// routes/web.php
Route::get('/rubrica', [RubricaController::class, 'formRubrica']);

//Rubrica
//Route::get('/formRubrica', [RubricaController::class, 'formRubrica']);




//Ejercicio
//Route::resource('ejercicio', EjercicioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/rubrica', [RubricaController::class, 'store'])->name('rubrica.store');
