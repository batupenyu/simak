<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bku extends Model
{
    use HasFactory;
    protected $table = 'bku';
    protected $fillable = (
        [
            'tgl_transaksi',
            'kode_rek',
            'no_bukti',
            'uraian',
            'type',
            'nominal',
            'ntpn',
            'pemotongan',
            'penyetoran',
            'volume',
            'satuan',
            'harga_satuan',
            'pendapatan',
            'belanja',
            'sisa_pagu',
        ]
    );
}
