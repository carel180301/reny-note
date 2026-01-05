<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimController;
use App\Models\Akm;
use App\Http\Controllers\AkmController;
use Illuminate\Http\Request;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function (Request $request) {

    $query = Akm::query()->orderBy('created_at', 'asc');

    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    if ($request->filled('status_sistem')) {
        $query->where('status_sistem', $request->status_sistem);
    }

    $akms = $query->get();

    return view('dashboard', compact('akms'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/akms', [AkmController::class, 'index'])->name('akms.index');
    Route::get('/akms/create', [AkmController::class, 'create'])->name('akms.create');
    Route::post('/akms', [AkmController::class, 'store'])->name('akms.store');
    Route::get('/akms/{akms}/edit', [AkmController::class, 'edit'])->name('akms.edit');
    Route::put('/akms/{akms}/update', [AkmController::class, 'update'])->name('akms.update');
    Route::delete('/akms/{akms}/destroy', [AkmController::class, 'destroy'])->name('akms.destroy');
    Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    Route::get('/akms/{akms}/send-email', [EmailsController::class, 'sendAkmEmail'])->name('akms.sendEmail');
    Route::get('/akms/search', [AkmController::class, 'search'])->name('akms.search');
    Route::post('/akms/upload', [AkmController::class, 'upload'])->name('akms.upload');
    Route::resource('akms', AkmController::class);
    Route::post('/akms/upload', [AkmController::class, 'upload'])->name('akms.upload');



    // Route::get('/akm', [AkmController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
