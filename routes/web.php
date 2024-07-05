<?php

use App\Http\Controllers\AirportsController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Remove or rename this route
// Route::get('/staff', function () {
//     return view('staff');
// })->middleware(['auth', 'verified'])->name('staff');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
Route::get('/staff/{id}', [StaffController::class, 'show'])->name('staff.show');
Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
Route::put('/staff/{id}/update', [StaffController::class, 'update'])->name('staff.update');
Route::delete('/staff/{id}/destroy', [StaffController::class, 'destroy'])->name('staff.destroy');


Route::resource('airports', AirportsController::class);
Route::get('airports/{airport}/flights', [AirportsController::class, 'flights'])->name('airports.flights');
Route::resource('flights', FlightsController::class)->except('dashboard');
require __DIR__.'/auth.php';

