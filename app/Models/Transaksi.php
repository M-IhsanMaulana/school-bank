<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Transaksi extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $table = 'tb_transaksi';
    protected $fillable = [
        'rekening_id',
        'kode_transaksi',
        'tgl_transaksi',
        'jenis_transaksi',
        'rekening_tujuan',
        'saldo_transaksi',
    ];

    public function rekening()
    {
        return $this->belongsTo(Rekening::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'kode_transaksi' => [
                'format' => function () {
                    return 'DPSVB' . date('dmY') . '?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }
}
