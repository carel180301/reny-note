<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Akm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_debitur',
        'cabang_bank',
        'nomor_rekening', 
        'nomor_polis', 
        'tanggal_polis',
        'nomor_stgr'
    ];
}
