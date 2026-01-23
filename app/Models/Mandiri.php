<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Mandiri extends Model
{
    use HasFactory;

    protected $fillable = [
        'uker',
        'nama_debitur',
        'nomor_rekening',
        'tuntutan',
        'net_klaim',
        'tanggal_klaim_diajukan',
        'status',
        'keterangan',
        'kekurangan_data',
        'tanggal_update',
        'nomor_box'

        // 'cabang_bank',
        // 'nilai_tuntutan_klaim',
        // 'tanggal_klaim_diterima',
        // 'tanggal_klaim_masuk_portal',
        // 'tambahan_data',
        // 'date_update',
        // 'nomor_box'
    ];
}
