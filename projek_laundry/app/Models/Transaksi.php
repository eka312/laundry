<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksis'; // nama tabel sesuai migrasi

    protected $primaryKey = 'id_transaksi'; // primary key sesuai migrasi

    protected $fillable = [
        'tanggal',
        'id_karyawan',
        'berat_barang',
        'id_pelanggan',
        'id_jenis',
        'total',
        'metode_pembayaran',
        'jumlah_bayar',
        'kembalian',
    ];

    // Relasi ke Karyawan
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    // Relasi ke Pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan', 'id_pelanggan');
    }

    // Relasi ke JenisBarang
    public function jenisBarang()
    {
        return $this->belongsTo(JenisBarang::class, 'id_jenis', 'id_jenis');

    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($transaksi) {
            if ($transaksi->jenisBarang) {
                $transaksi->total = $transaksi->berat_barang * $transaksi->jenisBarang->tarif;
            }
        });

        static::updating(function ($transaksi) {
            if ($transaksi->jenisBarang) {
                $transaksi->total = $transaksi->berat_barang * $transaksi->jenisBarang->tarif;
            }
        });
    }

    protected $casts = [
        'tanggal' => 'date',
    ];
}

