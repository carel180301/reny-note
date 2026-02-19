<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Pantry extends Model
{
    use HasFactory;

    protected $table = 'pantrys';

    protected $fillable = [
        'produk',
        'kategori',
        'nama_brand'
    ];
}
