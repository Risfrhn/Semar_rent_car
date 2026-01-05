<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromoModel extends Model
{
    protected $table = 'promos';
    protected $fillable = [
        'nama',
        'deskripsi',
        'flyer',
        'berlaku_hingga',
        'syarat'
    ];
}
