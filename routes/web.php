<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\TruckController;
use App\Http\Controllers\ScheduleTruckController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

// Admin user approval routes (manual admin check inside controller)
Route::prefix('admin')->group(function () {
    Route::get('users/pending', [AdminUserController::class, 'index'])->name('admin.users.pending');
    Route::post('users/{id}/approve', [AdminUserController::class, 'approve'])->name('admin.users.approve');
    Route::delete('users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('users/pending/export-pdf', [AdminUserController::class, 'exportPdf'])->name('admin.users.exportPdf');
    Route::get('users/approved', [AdminUserController::class, 'approved'])->name('admin.users.approved');
    Route::get('users/approved/export-pdf', [AdminUserController::class, 'exportApprovedPdf'])->name('admin.users.approved.exportPdf');

});


// Profile management routes (manual auth check inside controller)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Driver routes with PDF export (accessible to everyone, manual checks inside controllers if needed)
Route::resource('drivers', DriverController::class);
Route::get('/drivers/export/pdf', [DriverController::class, 'exportPDF'])->name('drivers.export.pdf');

// Truck routes with PDF export
Route::resource('trucks', TruckController::class);
Route::get('/trucks/pdf', [TruckController::class, 'exportPDF'])->name('trucks.pdf');

// Schedule Truck routes with PDF export
Route::resource('schedule_trucks', ScheduleTruckController::class);
Route::get('/schedule_trucks/pdf', [ScheduleTruckController::class, 'exportPDF'])->name('schedule_trucks.pdf');

Route::get('/real-time-truck-locations', [TruckController::class, 'getRealTimeTruckLocations'])->name('real-time-truck-locations');
Route::get('/api/getTruckLocation/{id}', [TruckController::class, 'getLocation']);

// Public routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
