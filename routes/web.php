<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExamenController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/examen/{id}', [ExamenController::class, 'index'])->middleware('auth');
Route::get('/examen/completado/{id}', [ExamenController::class, 'completeTest'])->middleware('auth');
Route::post('/examen/{id}', [ExamenController::class, 'create'])->middleware('auth');

Route::get('/admin/usuarios',function () {
    echo 'hola admin';
})->middleware('admin');

Route::get('/alumnos',function () {
    echo 'hola profesor';
})->middleware('profesor');
