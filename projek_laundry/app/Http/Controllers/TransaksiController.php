<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\JenisBarang;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    // Tampilkan semua data transaksi
    public function index()
    {
        // Pastikan relasi yang dipanggil benar (sesuaikan nama relasi di model)
        $transaksis = Transaksi::with(['karyawan', 'pelanggan', 'jenisBarang'])->get();
        return view('transaksi.data_transaksi', compact('transaksis'));
    }

    // Tampilkan form tambah transaksi
    public function create()
    {
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        $jenis = JenisBarang::all();

        return view('transaksi.tambah_transaksi', compact('karyawan', 'pelanggan', 'jenis'));
    }

    // Simpan data transaksi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'berat_barang' => 'required|numeric|min:0.01',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_jenis' => 'required|exists:jenis_barangs,id_jenis',
        ]);

        $jenisBarang = JenisBarang::findOrFail($validated['id_jenis']);
        $tarif = $jenisBarang->tarif;
        $total = $validated['berat_barang'] * $tarif;

        Transaksi::create([
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'berat_barang' => $validated['berat_barang'],
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_jenis' => $validated['id_jenis'],
            'total' => $total,
        ]);

        return redirect()->route('transaksi.data_transaksi')->with('success', 'Data transaksi berhasil ditambahkan.');
    }

    // Tampilkan form edit transaksi
    public function edit($id_transaksi)
    {
        // Pastikan ambil data 1 model bukan collection
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        $jenis = JenisBarang::all();

        return view('transaksi.ubah_transaksi', compact('transaksi', 'karyawan', 'pelanggan', 'jenis'));
    }

    // Update data transaksi
    public function update(Request $request, $id_transaksi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'berat_barang' => 'required|numeric|min:0.01',
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_jenis' => 'required|exists:jenis_barangs,id_jenis',
        ]);

        $transaksi = Transaksi::findOrFail($id_transaksi);

        $jenisBarang = JenisBarang::findOrFail($validated['id_jenis']);
        $tarif = $jenisBarang->tarif;
        $total = $validated['berat_barang'] * $tarif;

        $transaksi->update([
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'berat_barang' => $validated['berat_barang'],
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_jenis' => $validated['id_jenis'],
            'total' => $total,
        ]);

        return redirect()->route('transaksi.data_transaksi')->with('success', 'Data transaksi berhasil diubah.');
    }

    // Hapus data transaksi
    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);
        $transaksi->delete();

        return redirect()->route('transaksi.data_transaksi')->with('success', 'Data transaksi berhasil dihapus.');
    }
}
