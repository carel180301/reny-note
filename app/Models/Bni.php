<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bni extends Model
{
    use HasFactory;

    protected $fillable = [
        'tahun',
        'tanggal_dokumen_diterima'

        // 'nomor_rekening',
        // 'cabang_bank',
        // 'nilai_tuntutan',
        // 'nilai_net_klaim',
        // 'jw_awal',
        // 'jw_akhir',
        // 'status',
        // 'tanggal_cl',
        // 'keterangan_usaha',
        // 'nomor_cl',
        // 'kekurangan_data',
        // 'nomor_box'
    ];
}
