<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::get('/dashboard', function () {
    return view('welcome');
})->name('dashboard');
Route::get('/reserva', function () {
    return view('reserva');
})->name('reserva');
Route::post('/reservas', [ReservationController::class, 'store'])->name('reservations.store');
Route::get('/reservas/{id}', [ReservationController::class, 'show'])->name('reservations.show');

