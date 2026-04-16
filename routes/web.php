<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;


Route::get('/', [UserController::class, 'login'])->name('autentication.login');


// Rutas para tareas
Route::get('/tasks/index', [TasksController::class, 'index'])->name('tasks.index');
Route::get('/tasks/filtro', [TasksController::class, 'filtro'])->name('tasks.filtro');


// Rutas para autenticación
Route::get('/autentication/login', [UserController::class, 'login'])->name('autentication.login');
Route::post('/autentication/loginUser', [UserController::class, 'loginUser'])->name('autentication.loginUser');
Route::get('/autentication/register', [UserController::class, 'register'])->name('autentication.register');
Route::post('/autentication/registerUser', [UserController::class, 'registerUser'])->name('autentication.registerUser');
Route::get('/autentication/logout', [UserController::class, 'logout'])->name('autentication.logout');
Route::get('/autentication/denied', [UserController::class, 'denied'])->name('autentication.denied');
Route::get('/autentication/error', [UserController::class, 'error'])->name('autentication.error');




/////////////////////////////Rutas protegidas por middleware/////////////////////////////////////
Route::middleware(['auth', 'admin'])->group(function () {

    // Rutas de gestion de tareas
    Route::get('/tasks/create', [TasksController::class, 'create'])->name('tasks.create');
    Route::post('/tasks/store', [TasksController::class, 'store'])->name('tasks.store');
    Route::get('/tasks/show/{id}', [TasksController::class, 'show'])->name('tasks.show');
    Route::get('/tasks/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');
    Route::put('/tasks/update/{id}', [TasksController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/destroy/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

    // Rutas para administración de usuarios
    Route ::get('/usuarios/index', [UserController::class, 'usuarios_index'])->name('users.index');
    Route::get('/usuarios/create', [UserController::class, 'usuarios_create'])->name('users.create');
    Route::post('/usuarios/store', [UserController::class, 'usuarios_store'])->name('users.store');
    Route::get('/usuarios/show/{id}', [UserController::class, 'usuarios_show'])->name('users.show');
    Route::get('/usuarios/edit/{id}', [UserController::class, 'usuarios_edit'])->name('users.edit');
    Route::put('/usuarios/update/{id}', [UserController::class, 'usuarios_update'])->name('users.update');
    Route::delete('/usuarios/destroy/{id}', [UserController::class, 'usuarios_destroy'])->name('users.destroy');
    Route::delete('/usuarios/reload/{id}', [UserController::class, 'usuarios_alta'])->name('users.reload');

});