<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimController;
use App\Models\Akm;
use App\Http\Controllers\AkmController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    // $akms = Akm::orderBy('created_at', 'desc')->get();
    $akms = Akm::orderBy('created_at', 'asc')->get();
    return view('dashboard', compact('akms'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/claim', [ClaimController::class, 'index'])->name('claim.index');
    // Route::get('/claim/create', [ClaimController::class, 'create'])->name('claim.create');
    // Route::post('/claim', [ClaimController::class, 'store'])->name('claim.store');
    // Route::get('/claim/{claim}/edit', [ClaimController::class, 'edit'])->name('claim.edit');
    // Route::put('/claim/{claim}/update', [ClaimController::class, 'update'])->name('claim.update');
    // Route::delete('/claim/{claim}/destroy', [ClaimController::class, 'destroy'])->name('claim.destroy');
    // Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    // Route::get('/claim/{claim}/send-email', [EmailsController::class, 'sendClaimEmail'])->name('claim.sendEmail');
    // Route::get('/claim/search', [ClaimController::class, 'search'])->name('claim.search');
    // Route::post('/claim/upload', [ClaimController::class, 'upload'])->name('claim.upload');
    Route::resource('akms', AkmController::class);
    Route::post('/akms/upload', [AkmController::class, 'upload'])->name('akms.upload');



    // Route::get('/akm', [AkmController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
