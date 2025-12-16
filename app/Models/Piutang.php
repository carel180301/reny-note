<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Piutang extends Model
{
    use HasFactory;

    protected $fillable = [
        'cob',
        'nomor_polis',
        'tanggal_polis',
        'broker',
        'nama_tertanggung',
        'wpc',
        'email',
        'currency',
        'outstanding'
    ];
}
