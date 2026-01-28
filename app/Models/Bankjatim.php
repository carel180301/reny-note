<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bankjatim extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_bank',
        'nama',
        'nomor_rekening',
        'nilai_tuntutan',
        'net_klaim',
        'tanggal_dokumen_diterima'

        // 'net_klaim',
        // 'tanggal_klaim_diajukan',
        // 'status',
        // 'keterangan',
        // 'kekurangan_data',
        // 'tanggal_update',
        // 'nomor_box'

        // 'cabang_bank',
        // 'nilai_tuntutan_klaim',
        // 'tanggal_klaim_diterima',
        // 'tanggal_klaim_masuk_portal',
        // 'tambahan_data',
        // 'date_update',
        // 'nomor_box'
    ];
}
