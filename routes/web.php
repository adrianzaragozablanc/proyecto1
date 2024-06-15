<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');

    Route::get('/reserva', function () {
        return view('reserva');
    })->name('reserva');

    Route::post('/reservas', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservas/{id}', [ReservationController::class, 'show'])->name('reservations.show');
    Route::get('/showreserva', [ReservationController::class, 'index'])->name('reservations.index');

    Route::get('/reservations/{id}/edit', [ReservationController::class, 'edit'])->name('reservations.edit');
    Route::put('/reservations/{id}', [ReservationController::class, 'update'])->name('reservations.update');

    Route::resource('reservations', ReservationController::class)->except(['create', 'edit', 'update']);

    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('/admin/roles', [AdminController::class, 'editRoles'])->name('admin.roles.edit');
        Route::post('/admin/roles/{user}', [AdminController::class, 'updateRoles'])->name('admin.roles.update');
    });
});
