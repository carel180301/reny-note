<?php

namespace App\Http\Controllers;

use App\Mail\ReminderMail;
use App\Models\Piutang;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class EmailsController extends Controller
{
    public function sendPiutangEmail(Piutang $piutang)
    {
        $today = Carbon::today();
        $wpc = Carbon::parse($piutang->wpc);
        $daysLeft = $today->diffInDays($wpc, false);

        // Determine status color
        if ($daysLeft > 90) {
            return response()->json(['status' => 'blocked'], 403);
        }

        if ($daysLeft > 60) {
            if ($piutang->green_sent_at) {
                return response()->json(['status' => 'already_sent'], 403);
            }
            $piutang->green_sent_at = now();
        } elseif ($daysLeft > 30) {
            if ($piutang->yellow_sent_at) {
                return response()->json(['status' => 'already_sent'], 403);
            }
            $piutang->yellow_sent_at = now();
        } elseif ($daysLeft >= 0) {
            if ($piutang->red_sent_at) {
                return response()->json(['status' => 'already_sent'], 403);
            }
            $piutang->red_sent_at = now();
        }
        // Jika WPC sudah lewat → unlimited → no blocking

        Mail::to($piutang->email)->send(new ReminderMail($piutang));
        $piutang->save();

        session()->flash('success', 'Email berhasil dikirim ke: ' . $piutang->email);

        return response()->json(['status' => 'ok']);
    }
}
