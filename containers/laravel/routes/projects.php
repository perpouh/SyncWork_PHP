<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::middleware(['auth', 'verified'])->group(function () {
  Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
  Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
  Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
  Route::get('/projects/{id}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
  Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('projects.show');
  Route::put('/projects/{id}', [ProjectController::class, 'update'])->name('projects.update');
  Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');
  Route::post('/projects/{id}/archive', [ProjectController::class, 'archive'])->name('projects.archive');
  Route::post('/projects/{id}/unarchive', [ProjectController::class, 'unarchive'])->name('projects.unarchive');
});
