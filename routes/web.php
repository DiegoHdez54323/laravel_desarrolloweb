<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu', function () {
    return view('menu');
})->name('menu');

Route::get('/modulo/{module_name}', function ($module_name) {
    return view('modulo', ['module_name' => $module_name]);
})->name('module');

Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumnos_list');

Route::post('/alumnos/create', [AlumnoController::class, 'store'])->name('alumno_create');
