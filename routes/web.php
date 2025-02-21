<?php

use App\Http\Controllers\EstilosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesoresController;
use App\Http\Controllers\ClasesController;
use App\Http\Controllers\AsistenciasController;
use App\Http\Controllers\InscripcionesController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\IsncripController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);

Route::resource('clases', ClasesController::class);


Route::get('/profesores', [ProfesoresController::class, 'index'])->name('profesores.index');
Route::get('/profesores/create', [ProfesoresController::class, 'create'])->name('profesores.create');
Route::post('/profesores', [ProfesoresController::class, 'store'])->name('profesores.store');
Route::get('/profesores/{profesor}', [ProfesoresController::class, 'show'])->name('profesores.show');
Route::get('/profesores/{profesor}/edit', [ProfesoresController::class, 'edit'])->name('profesores.edit');
Route::put('/profesores/{profesor}', [ProfesoresController::class, 'update'])->name('profesores.update');
Route::delete('/profesores/{profesor}', [ProfesoresController::class, 'destroy'])->name('profesores.destroy');

Route::get('/inscripciones', [InscripcionesController::class, 'index'])->name('inscripciones.index');
Route::get('/inscripciones/create', [InscripcionesController::class, 'create'])->name('inscripciones.create');
Route::post('/inscripciones', [InscripcionesController::class, 'store'])->name('inscripciones.store');
Route::get('/inscripciones/{inscripcion}', [InscripcionesController::class, 'show'])->name('inscripciones.show');
Route::get('/inscripciones/{inscripcion}/edit', [InscripcionesController::class, 'edit'])->name('inscripciones.edit');
Route::put('/inscripciones/{inscripcion}', [InscripcionesController::class, 'update'])->name('inscripciones.update');
Route::delete('/inscripciones/{inscripcion}', [InscripcionesController::class, 'destroy'])->name('inscripciones.destroy');
Route::get('/inscripciones/{id}', [InscripcionesController::class, 'show'])->name('inscripciones.show');


});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/inscrip/create', [IsncripController::class, 'create'])->name('inscrip.create');



//Route::get('/inscripciones/create', [InscripcionesController::class, 'create'])->name('inscripciones.create');

Route::post('/inscrip', [IsncripController::class, 'store'])->name('inscrip.store');



Route::get('exportar-excel', [InscripcionesController::class, 'exportarExcel'])->name('exportar.excel');
Route::get('exportar-pdf', [InscripcionesController::class, 'exportarPDF'])->name('exportar.pdf');