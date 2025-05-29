<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_transaksi';
    protected $fillable = ['id_karyawan', 'id_pelanggan', 'id_jenis', 'tarif'];

    public function karyawan() {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }

    public function pelanggan() {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    public function jenis() {
        return $this->belongsTo(JenisBarang::class, 'id_jenis');
    }
}

