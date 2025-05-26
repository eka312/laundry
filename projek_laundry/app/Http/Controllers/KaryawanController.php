<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Karyawan;


class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawan = Karyawan::all(); 
         return view('karyawan.data_karyawan', compact('karyawan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawan.tambah_karyawan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_karyawan' => 'required',
            'no_telp_karyawan' => 'required',
        ]);

        // Simpan data ke database
        $karyawan = Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'no_telp_karyawan' => $request->no_telp_karyawan,
        ]);

        return redirect('/data_karyawan');
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
         $karyawan = Karyawan::findOrFail($id);
         return view('karyawan.ubah_karyawan', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $karyawan = Karyawan::findOrFail($id);

        $request->validate([
            'nama_karyawan' => 'required',
            'no_telp_karyawan' => 'required',
        ]);
    
        // Update data lain
        $karyawan->nama_karyawan = $request->nama_karyawan;
        $karyawan->no_telp_karyawan = $request->no_telp_karyawan;
        
        $karyawan->save();
    
        return redirect('/data_karyawan');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Karyawan::where('id_karyawan', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data karyawan
        return redirect('/data_karyawan');
    }
}
