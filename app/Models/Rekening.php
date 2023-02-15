<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;
    protected $table = 'tb_rekening';
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'jenis_kelamin',
        'nik',
        'nomor_induk',
        'alamat',
        'kelas_id',
        'no_rekening',
        'pin',
        'status_rek',
        'total_saldo'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}
