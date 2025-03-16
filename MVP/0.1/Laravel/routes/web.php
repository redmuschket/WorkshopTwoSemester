<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectDetailController;
use Illuminate\Support\Facades\Route;

#Route::get('/', function () {return view('welcome');});

// Отображение списка проектов
Route::get('/', [HomeController::class, 'index'])->name('home');
// Отображение списка проектов
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
// Отображение окна редактирования проекта
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
// Отображение проекта
Route::get('/projects/{project}/show', [ProjectController::class, 'show'])->name('projects.show');
// Отображение окна создания проекта
Route::get('/projects/create', [ProjectController::class,'create'])->name('projects.create');

// Создание нового проекта
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
// Добавление деталей проекта
Route::post('/projects/{project}/details', [ProjectDetailController::class, 'store'])->name('projects.details.store');
// Обновление проекта
Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');

