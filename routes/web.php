<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatapantryController;

/*
|--------------------------------------------------------------------------
| Root
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| Dashboard (FIXED)
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    // ================= Data Pantry =================
    Route::resource('datapantries', DatapantryController::class);
    Route::get('/datapantries/search', [DatapantryController::class, 'search'])->name('datapantries.search');
    Route::post('/datapantries/upload', [DatapantryController::class, 'upload'])->name('datapantries.upload');
    Route::get('/datapantries/{datapantries}/send-email', [EmailsController::class, 'sendDatapantryEmail'])->name('datapantries.sendEmail');

    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
