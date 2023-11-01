<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeditan extends Model
{
    use HasFactory;

    protected $fillable = [
        'namaUser',
        'bahasa',
        'dokFormat',
        'dokPengeditan'
    ];
}
