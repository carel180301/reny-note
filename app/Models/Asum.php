<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Asum extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tertanggung',
        'posisi',
        'cob',
        'nama_pekerjaan',
        'nomor_polis',
        'tanggal_polis',
        'nomor_stgr',
        'tanggal_stgr',
        'bulan_stgr',
        'tanggal_dol'
    ];
}
