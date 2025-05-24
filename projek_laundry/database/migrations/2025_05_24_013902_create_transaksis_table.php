<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
         Schema::create('transaksis', function (Blueprint $table) {
            $table->increment('id_transaksi'); // ID Transaksi
            $table->date('tanggal');
            $table->foreignId('id_karyawan')->constrained('karyawans')->onDelete('cascade');
            $table->float('berat_barang');
            $table->foreignId('id_pelanggan')->constrained('pelanggans')->onDelete('cascade');
            $table->foreignId('id_jenis')->constrained('jenis_barangs')->onDelete('cascade');
            $table->integer('tarif');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
