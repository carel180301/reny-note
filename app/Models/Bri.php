<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Symfony\Component\Mime\Email;

class Bri extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit'
    ];
}
