<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bjb extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_bank'

        // 'tanggal_dokumen_diterima',
        // 'nomor_dokumen_diterima',
        // 'nama_debitur',
        // 'nomor_rekening',
        // 'nilai_tuntutan',
        // 'nilai_net_klaim',
        // 'jw_awal',
        // 'jw_akhir',
        // 'status',
        // 'keterangan',
        // 'tanggal_cl',
        // 'nomor_cl',
        // 'nomor_memo_permohonan_pembayaran_klaim',
        // 'tanggal_memo_permohonan_pembayaran_klaim',
        // 'tanggal_pembayaran_klaim',
        // 'tanggal_pelunasan_di_bagian_keuangan'
    ];
}
