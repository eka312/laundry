<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
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
        $transaksi = Transaksi::with(['karyawan', 'pelanggan', 'jenisBarang'])->get();
        return view('transaksi.data_transaksi', compact('transaksi'));
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
            'id_pelanggan' => 'required|exists:pelanggans,id_pelanggan',
            'id_jenis' => 'required|exists:jenis_barangs,id_jenis',
            'berat_barang' => 'required|numeric|min:0.01',
            'status_cucian' => 'required|in:Dalam Proses, Selesai, Sudah Diambil',
            'jumlah_bayar' => 'required|integer|min:0',

            
        ]);

        $jenisBarang = JenisBarang::findOrFail($validated['id_jenis']);
        $tarif = $jenisBarang->tarif;
        $total = (int)($validated['berat_barang'] * $tarif);
        $kembalian = $validated['jumlah_bayar'] - $total;

        if ($kembalian < 0) {
            return back()->withErrors(['jumlah_bayar' => 'Jumlah bayar kurang dari total harga!'])->withInput();
        }
        
        Transaksi::create([
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'berat_barang' => $validated['berat_barang'],
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_jenis' => $validated['id_jenis'],
            'total' => $total,
            'status_cucian' => $validated['status_cucian'],
            'jumlah_bayar' => $validated['jumlah_bayar'],
            'kembalian' => $kembalian,
        ]);

        return redirect()->route('transaksi.data_transaksi')->with('success', 'Data transaksi berhasil ditambahkan.');
    }

    // Tampilkan detail transaksi
    public function show($id_transaksi)
    {
        $transaksi = Transaksi::with(['karyawan', 'pelanggan', 'jenisBarang'])->findOrFail($id_transaksi);
        return view('transaksi.detail_transaksi', compact('transaksi'));
    }


    // Tampilkan form edit transaksi
    public function edit($id_transaksi)
    {
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
            'jumlah_bayar' => 'required|integer|min:0',
            'status_cucian' => 'required|in:Dalam Proses, Selesai, Sudah Diambil',
        ]);

        $transaksi = Transaksi::findOrFail($id_transaksi);

        $jenisBarang = JenisBarang::findOrFail($validated['id_jenis']);
        $tarif = $jenisBarang->tarif;
        $total = (int)$validated['berat_barang'] * $tarif;
        $kembalian = $validated['jumlah_bayar'] - $total;

        if ($kembalian < 0) {
            return back()->withErrors(['jumlah_bayar' => 'Jumlah bayar kurang dari total harga!'])->withInput();
        }

        $transaksi->update([
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'berat_barang' => $validated['berat_barang'],
            'id_pelanggan' => $validated['id_pelanggan'],
            'id_jenis' => $validated['id_jenis'],
            'total' => $total,
            'jumlah_bayar' => $validated['jumlah_bayar'],
            'status_cucian' => $validated['status_cucian'],
            'kembalian' => $kembalian,
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
