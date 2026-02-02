<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimController;
// use App\Models\Akm;
// use App\Models\Asum;
use App\Models\Bri;
use App\Models\Mandiri;
use App\Models\Bankjatim;
// use App\Http\Controllers\AkmController;
// use App\Http\Controllers\AsumController;
use App\Http\Controllers\BriController;
use App\Http\Controllers\MandiriController;
use App\Http\Controllers\BankjatimController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function (Request $request) {
    $table = $request->get('table', 'bri');

    // $akms = collect();
    // $asums = collect();
    $bris = collect();
    $mandiris = collect();
    $bankjatims = collect();


//    if ($table === 'akm') {
//     $query = Akm::query()->orderBy('created_at', 'asc');

//         if ($request->filled('status')) {
//             $query->where('status', $request->status);
//         }

//         if ($request->filled('status_sistem')) {
//             $query->where('status_sistem', $request->status_sistem);
//         }

//         $akms = $query->get();
//     }

    // if ($table === 'asum') {
    //     $query = Asum::query()->orderBy('created_at', 'asc');

    //     if ($request->filled('status')) {
    //         $query->where('status', $request->status);
    //     }

    //     if ($request->filled('status_sistem')) {
    //         $query->where('status_sistem', $request->status_sistem);
    //     }

    //     if ($request->filled('status_pembayaran')) {
    //         $query->where('status_pembayaran', $request->status_pembayaran);
    //     }

    //     $asums = $query->get();
    // }

    if ($table === 'bri') {
        $query = Bri::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $bris = $query->get();
    }

    else if ($table === 'mandiri') {
        $query = Mandiri::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $mandiris = $query->get();
    }

    else if ($table === 'bankjatim') {
        $query = Bankjatim::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $bankjatims = $query->get();
    }


    return view('dashboard', compact('bris', 'mandiris', 'bankjatims','table'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/akms', [AkmController::class, 'index'])->name('akms.index');
    // Route::get('/akms/create', [AkmController::class, 'create'])->name('akms.create');
    // Route::post('/akms', [AkmController::class, 'store'])->name('akms.store');
    // Route::get('/akms/{akms}/edit', [AkmController::class, 'edit'])->name('akms.edit');
    // Route::put('/akms/{akms}/update', [AkmController::class, 'update'])->name('akms.update');
    // Route::delete('/akms/{akms}/destroy', [AkmController::class, 'destroy'])->name('akms.destroy');
    // Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    // Route::get('/akms/{akms}/send-email', [EmailsController::class, 'sendAkmEmail'])->name('akms.sendEmail');
    // Route::get('/akms/search', [AkmController::class, 'search'])->name('akms.search');
    // Route::post('/akms/upload', [AkmController::class, 'upload'])->name('akms.upload');
    // Route::resource('akms', AkmController::class);
    // Route::post('/akms/upload', [AkmController::class, 'upload'])->name('akms.upload');
    // Route::get('/akm', [AkmController::class, 'index']);

    // Route::get('/asums', [AsumController::class, 'index'])->name('asums.index');
    // Route::get('/asums/create', [AsumController::class, 'create'])->name('asums.create');
    // Route::post('/asums', [AsumController::class, 'store'])->name('asums.store');
    // Route::get('/asums/{asums}/edit', [AsumController::class, 'edit'])->name('asums.edit');
    // Route::put('/asums/{asums}/update', [AsumController::class, 'update'])->name('asums.update');
    // Route::delete('/asums/{asums}/destroy', [AsumController::class, 'destroy'])->name('asums.destroy');
    // Route::get('/asums/search', [AsumController::class, 'search'])->name('asums.search');
    // Route::post('/asums/upload', [AsumController::class, 'upload'])->name('asums.upload');

    Route::get('/bris', [BriController::class, 'index'])->name('bris.index');
    Route::get('/bris/create', [BriController::class, 'create'])->name('bris.create');
    Route::post('/bris', [BriController::class, 'store'])->name('bris.store');
    Route::get('/bris/{bris}/edit', [BriController::class, 'edit'])->name('bris.edit');
    Route::put('/bris/{bris}/update', [BriController::class, 'update'])->name('bris.update');
    Route::delete('/bris/{bris}/destroy', [BriController::class, 'destroy'])->name('bris.destroy');
    Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    Route::get('/bris/{bris}/send-email', [EmailsController::class, 'sendBriEmail'])->name('bris.sendEmail');
    Route::get('/bris/search', [BriController::class, 'search'])->name('bris.search');
    Route::post('/bris/upload', [BriController::class, 'upload'])->name('bris.upload');
    Route::resource('bris', BriController::class);
    Route::post('/bris/upload', [BriController::class, 'upload'])->name('bris.upload');

    Route::get('/mandiris', [MandiriController::class, 'index'])->name('mandiris.index');
    Route::get('/mandiris/create', [MandiriController::class, 'create'])->name('mandiris.create');
    Route::post('/mandiris', [MandiriController::class, 'store'])->name('mandiris.store');
    Route::get('/mandiris/{mandiris}/edit', [MandiriController::class, 'edit'])->name('mandiris.edit');
    Route::put('/mandiris/{mandiris}/update', [MandiriController::class, 'update'])->name('mandiris.update');
    Route::delete('/mandiris/{mandiris}/destroy', [MandiriController::class, 'destroy'])->name('mandiris.destroy');
    Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    Route::get('/mandiris/{mandiris}/send-email', [EmailsController::class, 'sendMandiriEmail'])->name('mandiris.sendEmail');
    Route::get('/mandiris/search', [MandiriController::class, 'search'])->name('mandiris.search');
    Route::post('/mandiris/upload', [MandiriController::class, 'upload'])->name('mandiris.upload');
    Route::resource('mandiris', MandiriController::class);
    Route::post('/mandiris/upload', [MandiriController::class, 'upload'])->name('mandiris.upload');

    Route::get('/bankjatims', [BankjatimController::class, 'index'])->name('bankjatims.index');
    Route::get('/bankjatims/create', [BankjatimController::class, 'create'])->name('bankjatims.create');
    Route::post('/bankjatims', [BankjatimController::class, 'store'])->name('bankjatims.store');
    Route::get('/bankjatims/{bankjatims}/edit', [BankjatimController::class, 'edit'])->name('bankjatims.edit');
    Route::put('/bankjatims/{bankjatims}/update', [BankjatimController::class, 'update'])->name('bankjatims.update');
    Route::delete('/bankjatims/{bankjatims}/destroy', [BankjatimController::class, 'destroy'])->name('bankjatims.destroy');
    Route::get('send-mail', [EmailsController::class, 'reminderEmail']);
    Route::get('/bankjatims/{bankjatims}/send-email', [EmailsController::class, 'sendBankJatimEmail'])->name('bankjatims.sendEmail');
    Route::get('/bankjatims/search', [BankjatimController::class, 'search'])->name('bankjatims.search');
    Route::post('/bankjatims/upload', [BankjatimController::class, 'upload'])->name('bankjatims.upload');
    Route::resource('bankjatims', BankjatimController::class);
    Route::post('/bankjatims/upload', [BankjatimController::class, 'upload'])->name('bankjatims.upload');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
