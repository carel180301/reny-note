<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PantryController;
use App\Models\Pantry;


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
// Route::get('/pantry', [PantryController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('pantry');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', function () {
    $pantrys = Pantry::orderBy('created_at', 'asc')->get();
    return view('dashboard', compact('pantrys'));
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // ================= Pantry =================
    Route::resource('pantrys', PantryController::class);
    Route::get('/pantrys/search', [PantryController::class, 'search'])->name('pantrys.search');
    Route::post('/pantrys/upload', [PantryController::class, 'upload'])->name('pantrys.upload');
    Route::get('/pantrys/{pantrys}/send-email', [EmailsController::class, 'sendPantryEmail'])->name('pantrys.sendEmail');

    // ================= PROFILE =================
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
