<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelanggan = Pelanggan::all(); 
         return view('pelanggan.data_pelanggan', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan.tambah_pelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required',
            
        ]);
        


        // Simpan data ke database
        $pelanggan = Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            
        ]);

        return redirect('/data_pelanggan');
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
         // untuk mengambil data projek berdasarkan kolom id_projek
         $pelanggan = pelanggan::findOrFail($id);
         return view('pelanggan.ubah_pelanggan', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        $request->validate([
            'nama_pelanggan' => 'required|string|max:255',
            'no_telp' => 'required|string|max:255',
            'alamat' => 'required',
        ]);

    
        // Update data lain
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->no_telp = $request->no_telp;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->save();
    
        return redirect('/data_pelanggan');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Pelanggan::where('id_pelanggan', $id)->delete();
        
        //setelah terhapus akan dialihkan ke hal data pelanggan
        return redirect('/data_pelanggan');
    }
}
