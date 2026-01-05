<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogModel extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'judul',
        'tanggal_publish',
        'gambar_utama',
        'gambar_pendukung',
        'subjudul1',
        'deskripsi1',
        'subjudul2',
        'deskripsi2',
        'subjudul3',
        'deskripsi3',
    ];
}
