<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogModel extends Model
{
    use HasFactory;

    protected $table = 'catalog';

    protected $fillable = [
        'nama',
        'harga',
        'seat',
        'fasilitas',
        'gambar',
        'jumlah',
        'type'
    ];

    protected $casts = [
        'fasilitas' => 'array',
    ];
}
