<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\ScheduleTruckController;
use Illuminate\Support\Facades\Route;

Route::resource('drivers', DriverController::class);
Route::get('/drivers/export/pdf', [DriverController::class, 'exportPDF'])->name('drivers.export.pdf');

Route::get('/trucks/pdf', [TruckController::class, 'exportPDF'])->name('trucks.pdf');
Route::resource('trucks', TruckController::class);

Route::get('/schedule_trucks/pdf', [ScheduleTruckController::class, 'exportPDF'])->name('schedule_trucks.pdf');
Route::resource('schedule_trucks', ScheduleTruckController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
