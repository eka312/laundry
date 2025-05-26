<?php

namespace App\Http\Controllers;
use App\Models\Karyawan;
use App\Models\Pelanggan;
use App\Models\JenisBarang;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with(['karyawan', 'pelanggan', 'jenis'])->get();
        return view('transaksi.data_transaksi', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        $jenis = JenisBarang::all();
        return view('transaksi.tambah_transaksi', compact('karyawan', 'pelanggan', 'jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'id_pelanggan' => 'required',
            'id_jenis' => 'required',
            'tarif' => 'required|numeric'
        ]);

        Transaksi::create($request->all());
        return redirect('/transaksi')->with('success', 'Data transaksi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $karyawan = Karyawan::all();
        $pelanggan = Pelanggan::all();
        $jenis = JenisBarang::all();
        return view('transaksi.ubah_transaksi', compact('transaksi', 'karyawan', 'pelanggan', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_karyawan' => 'required',
            'id_pelanggan' => 'required',
            'id_jenis' => 'required',
            'tarif' => 'required|numeric'
        ]);

        $transaksi = Transaksi::findOrFail($id_transaksi);
        $transaksi->update($request->all());

        return redirect('/transaksi')->with('success', 'Data transaksi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = Transaksi::findOrFail($id_transaksi);
        $transaksi->delete();
        return redirect('/transaksi')->with('success', 'Data transaksi berhasil dihapus!');
    }
}
