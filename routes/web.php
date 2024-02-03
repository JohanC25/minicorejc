<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\MiniCoreController;
use App\Http\Controllers\NotaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas
| serán asignadas al grupo de middleware "web". ¡Haz algo grandioso!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rutas para Estudiantes
Route::resource('estudiantes', EstudianteController::class);

// Rutas para Notas
Route::resource('notas', NotaController::class);

//Ruta para MiniCore
Route::get('/minicore-notas', [MiniCoreController::class, 'index'])->name('minicore.index');
Route::post('/minicore-notas/calcular', [MiniCoreController::class, 'calcularProgreso'])->name('minicore.calcular_progreso');
