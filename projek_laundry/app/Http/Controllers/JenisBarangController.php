<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\JenisBarang;


class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisBarang::all(); 
         return view('jenis_barang.data_jenis', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_barang.tambah_jenis');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'tarif' => 'required',
        ]);

        // Simpan data ke database
        $jenis = JenisBarang::create([
            'nama_barang' => $request->nama_barang,
            'tarif' => $request->tarif,
        ]);

        return redirect('/data_jenis');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         // untuk mengambil data karyawan berdasarkan kolom id_karyawan
         $jenis = JenisBarang::findOrFail($id);
         return view('jenis_barang.ubah_jenis', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $jenis = JenisBarang::findOrFail($id);

        $request->validate([
            'nama_barang' => 'required',
            'tarif' => 'required',
        ]);
    
        // Update data lain
        $jenis->nama_barang = $request->nama_barang;
        $jenis->tarif = $request->tarif;
        
        $jenis->save();
    
        return redirect('/data_jenis');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = JenisBarang::where('id_jenis', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data karyawan
        return redirect('/data_jenis');
    }
}
