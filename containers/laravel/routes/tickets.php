<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TicketController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/projects/{project_id}/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::get('/projects/{project_id}/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::post('/projects/{project_id}/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/projects/{project_id}/tickets/{ticket_id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::get('/projects/{project_id}/tickets/{ticket_id}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
    Route::put('/projects/{project_id}/tickets/{ticket_id}', [TicketController::class, 'update'])->name('tickets.update');
    Route::delete('/projects/{project_id}/tickets/{ticket_id}', [TicketController::class, 'destroy'])->name('tickets.destroy');
});
