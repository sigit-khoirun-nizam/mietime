<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pelanggan',
        'nama_makanan',
        'no_wa',
        'alamat',
        'deskripsi',
        'gambar'
    ];
}
