<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class paket extends Model
{
    protected $fillable = [
        'id_paket',
        'jenis',
        'nama_paket'
    ];

    protected $table = 'paket';
}
