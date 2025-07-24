<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBarang extends Model
{
    use HasFactory;

    protected $table = 'jenis_barangs';
    protected $primaryKey = 'id_jenis';
    protected $fillable = ['nama_barang','tarif'];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class, 'id_jenis');
    }
}
