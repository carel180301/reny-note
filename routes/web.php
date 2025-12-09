<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PiutangController;
use App\Models\Piutang;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect()->route('login');
});



Route::get('/dashboard', function () {
    $piutangs = Piutang::orderBy('created_at', 'desc')->get();
    return view('dashboard', compact('piutangs'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/piutang', [PiutangController::class, 'index'])->name('piutang.index');
    Route::get('/piutang/create', [PiutangController::class, 'create'])->name('piutang.create');
    Route::post('/piutang', [PiutangController::class, 'store'])->name('piutang.store');
    Route::get('/piutang/{piutang}/edit', [PiutangController::class, 'edit'])->name('piutang.edit');
    Route::put('/piutang/{piutang}/update', [PiutangController::class, 'update'])->name('piutang.update');
    Route::delete('/piutang/{piutang}/destroy', [PiutangController::class, 'destroy'])->name('piutang.destroy');
    Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    Route::get('/piutang/{piutang}/send-email', [EmailsController::class, 'sendPiutangEmail'])->name('piutang.sendEmail');
    Route::get('/piutang/search', [PiutangController::class, 'search'])->name('piutang.search');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
