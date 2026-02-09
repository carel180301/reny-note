<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bjb extends Model
{
    use HasFactory;

    protected $fillable = [
        'cabang_bank',
        'nama_debitur',
        'nomor_rekening',
        'tuntutan',
        'net_klaim',
        'tanggal_dokumen_diterima',
        'status',
        'keterangan',
        'nomor_cl',
        'date_update',
        'nomor_memo_permohonan_pembayaran_klaim',
        'tanggal_memo_permohonan_pembayaran_klaim',
        'tanggal_pembayaran_klaim'
    ];
}
