<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Asum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tertanggung'
        // 'cabang_bank',
        // 'nomor_rekening', 
        // 'nomor_polis', 
        // 'tanggal_polis',
        // 'nomor_stgr',
        // 'tanggal_stgr',
        // 'bulan_stgr',
        // 'tanggal_dol',
        // 'jangka_waktu_awal',
        // 'jangka_waktu_akhir',
        // 'penyebab_klaim',
        // 'plafond',
        // 'nilai_tuntutan_klaim',
        // 'status',
        // 'tindak_lanjut',
        // 'nomor_surat_tambahan_data',
        // 'tanggal_surat_tambahan_data',
        // 'nomor_register_sistem',
        // 'tanggal_register_sistem',
        // 'status_sistem',
        // 'keterangan',
        // 'nomor_surat_persetujuan_atau_penolakan',
        // 'tanggal_surat_persetujuan_atau_penolakan'
    ];
}
