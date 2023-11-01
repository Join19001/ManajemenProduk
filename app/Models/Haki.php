<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Haki extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenisProduk',
        'layananHaki',
        'judulProduk',
        'tglPembuatan',
        'ktp',
        'dokProduk',
        'deskripsi'
    ];
}
