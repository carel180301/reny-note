<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Datapantry;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $table = $request->table;

        // reusable date filter (FIXED)
        $applyDateFilter = function ($query, $column, $days) {
            if (!$days) return;

            $days = (int) $days;
            $today = Carbon::today();

            if ($days > 0) {
                // future
                $query->whereBetween($column, [$today, $today->copy()->addDays($days)]);
            } else {
                // past
                $query->whereBetween($column, [$today->copy()->subDays(abs($days)), $today]);
            }
        };

        switch ($table) {
            // case 'bri':
            //     $query = Bri::query();

            //     if ($request->status) {
            //         $query->where('status', $request->status);
            //     }

            //     $applyDateFilter($query, 'tanggal_klaim_diterima', $request->diterima);
            //     $applyDateFilter($query, 'tanggal_klaim_masuk_portal', $request->portal);
            //     $applyDateFilter($query, 'date_update', $request->update);

            //     $bris = $query->orderBy('created_at')->get();

            //     return view('dashboard', compact('bris'));
            // break;

            case 'datapantry':
                $query = Datapantry::query();

                if ($request->status) {
                    $query->where('status', $request->status);
                }

                // $applyDateFilter($query, 'tanggal_pelunasan_di_bagiian_keuangan', $request->tanggal_pelunasan);

                $datapantries = $query->orderBy('created_at')->get();

                return view('dashboard', compact('datapantries'));
            break;

            default:
                return view('dashboard');
        }
    }
}
