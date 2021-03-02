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


// Rutas de Admin
Route::get('/admin', [AdminController::class, 'index'])->middleware('admin');
Route::get('/admin/alumnos', [AdminController::class, 'getAlumnos'])->middleware('admin');
Route::get('/admin/cursos', [AdminController::class, 'getCursos'])->middleware('admin');
Route::get('/admin/profesores', [AdminController::class, 'getProfesores'])->middleware('admin');

// Rutas de Profesores
Route::get('/profesor', [ProfesorController::class, 'index'])->middleware('profesor'); //ok
Route::get('/profesor/examenes', [ProfesorController::class, 'getExamenes'])->middleware('profesor'); //ok
Route::get('/profesor/examen/{id}', [ProfesorController::class, 'getExamen'])->middleware('profesor');

Route::get('/profesor/cursos', [ProfesorController::class, 'getCursos'])->middleware('profesor'); //ok
Route::get('/profesor/curso/{id}', [ProfesorController::class, 'getAlumnosCurso'])->middleware('profesor'); //ok

Route::get('/profesor/curso/{id_curso}/alumno/{id_alumno}', [ProfesorController::class, 'getAlumno'])->middleware('profesor')->name('alumno');
Route::get('/profesor/curso/{id_curso}/alumno/{id_alumno}/examen/{id_examen}', [ProfesorController::class, 'getExamenAlumno'])->middleware('profesor')->name('alumno.examen'); //ok
