<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class detailTransaksi extends Model
{
    protected $fillable = [
        'id_transaksi',
        'id_paket',
        'qty',
        'keterangan'
    ];

    protected $table = 'DetailTransaksi';
}
