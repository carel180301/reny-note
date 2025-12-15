<?php

namespace App\Http\Controllers;

use App\Mail\ReminderMail;
use App\Models\Piutang;
use Illuminate\Support\Facades\Mail;

class EmailsController extends Controller
{
    public function sendPiutangEmail(Piutang $piutang)
    {
        Mail::to($piutang->email)->send(new ReminderMail($piutang));

        // IMPORTANT FIX → Return JSON instead of redirect
        session()->flash('success', 'Email berhasil dikirim ke: ' . $piutang->email);

        return response()->json(['status' => 'ok']);
    }
}
