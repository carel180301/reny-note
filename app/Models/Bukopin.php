<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bukopin extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_debitur',
        'nomor_rekening',
        'cabang_bank',
        'nilai_tuntutan'

        // 'nilai_tuntutan_klaim',
        // 'net_klaim',
        // 'tanggal_dokumen_diterima',
        // 'status',
        // 'keterangan',
        // 'nomor_cl',
        // 'date_update',
        // 'nomor_memo',
        // 'tanggal_memo',
        // 'tanggal_pembayaran_klaim',
        // 'tanggal_pelunasan'

        // 'nilai_tuntutan',
        // 'net_klaim',
        // 'tanggal_disetujui',
        // 'tambahan_data'

        // 'net_klaim',
        // 'tanggal_klaim_diajukan',
        
        // 'kekurangan_data',
        // 'tanggal_update',
        // 'nomor_box'

        // 'tanggal_klaim_diterima',
        // 'tanggal_klaim_masuk_portal',
        // 'tambahan_data',
        // 'date_update',
        // 'nomor_box'
    ];
}
