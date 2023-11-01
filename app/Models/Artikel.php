<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenisArtikel',
        'kategoriArtikel',
        'namaPenulis',
        'judulArtikel',
        'affiliasi',
        'email',
        'dokArtikel'
    ];
}
