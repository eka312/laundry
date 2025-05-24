@extends('templating.master')

@section('judul_halaman', 'Ubah Data pelanggan | Selsil Laundry')

@section('konten')
    <div class="container text-capitalize">
        <h1 class="mt-4">Ubah data pelanggan</h1>
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/data_pelanggan">data pelanggan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ubah data pelanggan</li>
            </ol>
        </nav>

        <div class="card mb-4">
            <div class="card-header bg-primary text-light">
                <i class="fas fa-table me-1"></i>
                Ubah daftar data pelanggan
            </div>
            <div class="card-body text-capitalize">
                <form action="{{ route('name_edit_pelanggan', $pelanggan->id_pelanggan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 row">
                        <label for="nama_pelanggan" class="col-sm-2 col-form-label">nama pelanggan </label>
                        <div class="col-sm-10">
                            <input name="nama_pelanggan"  value="{{$pelanggan->nama_pelanggan}}" class="form-control " type="text" placeholder="Masukkan nama pelanggan" id="judul" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="no_telp" class="col-sm-2 col-form-label">no telp </label>
                        <div class="col-sm-10">
                            <input name="no_telp"  value="{{$pelanggan->no_telp}}" class="form-control " type="tex" placeholder="Masukkan no telp pelanggan" id="deskripsi" aria-label=".form-control-lg example">
                        </div>
                    </div>
                    <div class="mb-4 row">
                        <label for="alamat" class="col-sm-2 col-form-label"> alamat </label>
                        <div class="col-sm-10">
                            <input name="alamat"  value="{{$pelanggan->alamat}}"  class="form-control " type="text" placeholder="Masukkan alamat " id="alamat" aria-label=".form-control-lg example">
                        </div>
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
    
@endsection
