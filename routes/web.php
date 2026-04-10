<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;

Route::get('/', [TasksController::class, 'index'])->name('tasks.index');
Route::get('/create', [TasksController::class, 'create'])->name('tasks.create');
Route::post('/store', [TasksController::class, 'store'])->name('tasks.store');
Route::get('/show/{id}', [TasksController::class, 'show'])->name('tasks.show');
Route::get('/edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit');
Route::put('/update/{id}', [TasksController::class, 'update'])->name('tasks.update');
Route::delete('/destroy/{id}', [TasksController::class, 'destroy'])->name('tasks.destroy');

Route::get('/fecha', [TasksController::class, 'fecha'])->name('tasks.fecha');
Route::get('/filtro', [TasksController::class, 'filtro'])->name('tasks.filtro');

    