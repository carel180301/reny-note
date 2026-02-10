<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClaimController;
use App\Models\Bri;
use App\Models\Mandiri;
use App\Models\Bankjatim;
use App\Models\Btn;
use App\Models\Bukopin;
use App\Models\Bni;
use App\Models\Bjb;
use App\Http\Controllers\BriController;
use App\Http\Controllers\MandiriController;
use App\Http\Controllers\BankjatimController;
use App\Http\Controllers\BtnController;
use App\Http\Controllers\BukopinController;
use App\Http\Controllers\BniController;
use App\Http\Controllers\BjbController;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function (Request $request) {

    /**
     * ✅ FIX: If no table parameter, redirect to default BRI table
     */
    if (!$request->has('table')) {
        return redirect()->route('dashboard', ['table' => 'bri']);
    }

    $table = $request->get('table', 'bri');

    $bris = collect();
    $mandiris = collect();
    $bankjatims = collect();
    $btns = collect();
    $bukopins = collect();
    $bnis = collect();
    $bjbs = collect();

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

    else if ($table === 'btn') {
        $query = Btn::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $btns = $query->get();
    }

    else if ($table === 'bukopin') {
        $query = Bukopin::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $bukopins = $query->get();
    }

    else if ($table === 'bni') {
        $query = Bni::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $bnis = $query->get();
    }

    else if ($table === 'bjb') {
        $query = Bjb::query()->orderBy('created_at', 'asc');

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('status_sistem')) {
            $query->where('status_sistem', $request->status_sistem);
        }

        if ($request->filled('status_pembayaran')) {
            $query->where('status_pembayaran', $request->status_pembayaran);
        }

        $bjbs = $query->get();
    }

    return view('dashboard', compact(
        'bris',
        'mandiris',
        'bankjatims',
        'btns',
        'bukopins',
        'bnis',
        'bjbs',
        'table'
    ));

})->middleware(['auth', 'verified'])->name('dashboard');


/**
 * ===================== AUTH ROUTES =====================
 */
Route::middleware('auth')->group(function () {

    Route::resource('bris', BriController::class);
    Route::get('/bris/search', [BriController::class, 'search'])->name('bris.search');
    Route::post('/bris/upload', [BriController::class, 'upload'])->name('bris.upload');
    Route::get('/bris/{bris}/send-email', [EmailsController::class, 'sendBriEmail'])->name('bris.sendEmail');

    Route::resource('mandiris', MandiriController::class);
    Route::get('/mandiris/search', [MandiriController::class, 'search'])->name('mandiris.search');
    Route::post('/mandiris/upload', [MandiriController::class, 'upload'])->name('mandiris.upload');
    Route::get('/mandiris/{mandiris}/send-email', [EmailsController::class, 'sendMandiriEmail'])->name('mandiris.sendEmail');

    Route::resource('bankjatims', BankjatimController::class);
    Route::get('/bankjatims/search', [BankjatimController::class, 'search'])->name('bankjatims.search');
    Route::post('/bankjatims/upload', [BankjatimController::class, 'upload'])->name('bankjatims.upload');
    Route::get('/bankjatims/{bankjatims}/send-email', [EmailsController::class, 'sendBankJatimEmail'])->name('bankjatims.sendEmail');

    Route::resource('btns', BtnController::class);
    Route::get('/btns/search', [BtnController::class, 'search'])->name('btns.search');
    Route::post('/btns/upload', [BtnController::class, 'upload'])->name('btns.upload');
    Route::get('/btns/{btns}/send-email', [EmailsController::class, 'sendBtnEmail'])->name('btns.sendEmail');

    Route::resource('bukopins', BukopinController::class);
    Route::get('/bukopins/search', [BukopinController::class, 'search'])->name('bukopins.search');
    Route::post('/bukopins/upload', [BukopinController::class, 'upload'])->name('bukopins.upload');
    Route::get('/bukopins/{bukopins}/send-email', [EmailsController::class, 'sendBukopinnEmail'])->name('bukopins.sendEmail');

    Route::resource('bnis', BniController::class);
    Route::get('/bnis/search', [BniController::class, 'search'])->name('bnis.search');
    Route::post('/bnis/upload', [BniController::class, 'upload'])->name('bnis.upload');
    Route::get('/bnis/{bnis}/send-email', [EmailsController::class, 'sendBniEmail'])->name('bnis.sendEmail');

    Route::resource('bjbs', BjbController::class);
    Route::get('/bjbs/search', [BjbController::class, 'search'])->name('bjbs.search');
    Route::post('/bjbs/upload', [BjbController::class, 'upload'])->name('bjbs.upload');
    Route::get('/bjbs/{bjbs}/send-email', [EmailsController::class, 'sendBjbEmail'])->name('bjbs.sendEmail');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
