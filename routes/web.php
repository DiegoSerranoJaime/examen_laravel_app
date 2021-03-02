<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfesorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/examen/{id}', [ExamenController::class, 'index'])->middleware('auth');
Route::get('/examen/completado/{id}', [ExamenController::class, 'completeTest'])->middleware('auth');
Route::post('/examen/{id}', [ExamenController::class, 'create'])->middleware('auth');

Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');

// Rutas de Admin
Route::get('/admin/alumnos', [AdminController::class, 'getAlumnos'])->middleware('admin');
Route::get('/admin/cursos', [AdminController::class, 'getCursos'])->middleware('admin');
Route::get('/admin/profesores', [AdminController::class, 'getProfesores'])->middleware('admin');

// Rutas de Profesores
Route::get('/profesor', [ProfesorController::class, 'index'])->middleware('profesor');
Route::get('/profesor/examenes', [ProfesorController::class, 'getExamenes'])->middleware('profesor');
Route::get('/profesor/examen/{id}', [ProfesorController::class, 'getExamen'])->middleware('profesor');
Route::get('/profesor/cursos', [ProfesorController::class, 'getCursos'])->middleware('profesor');
Route::get('/profesor/curso/{id}', [ProfesorController::class, 'getCurso'])->middleware('profesor');
Route::get('/profesor/alumno/{id}', [ProfesorController::class, 'getAlumno'])->middleware('profesor');
Route::get('/profesor/alumno/{id}/examen/{id}', [ProfesorController::class, 'getExamenAlumno'])->middleware('profesor');
