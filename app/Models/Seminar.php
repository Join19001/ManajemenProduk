<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenisSeminar',
        'namaSeminar',
        'role',
        'namaPendaftar',
        'nomorHP',
        'email',
        'buktiBayar',
        'dokAbstrak',
        'dokPemakalah',
        'pdfPemakalah'
    ];
}
