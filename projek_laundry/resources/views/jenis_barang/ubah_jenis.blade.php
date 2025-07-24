@extends('templating.master')

@section('judul_halaman', ' Ubah Data Jenis Barang | SelSil Laundry')

@section('konten')
<div class="container text-capitalize" style="background-color: #fef7f1; padding: 2rem; border-radius: 10px;">
    <h1 class="mt-4 text-dark">ubah data Jenis Barang</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/data_jenis" class="text-primary">data Jenis Barang</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">ubah data Jenis Barang</li>
        </ol>
    </nav>

    <div class="card mb-4" style="background-color: #e1e9f1;">
        <div class="card-header text-light" style="background-color: #002f5f;">
            <i class="fas fa-edit me-1"></i>
            Ubah Data Jenis Barang
        </div>
        <div class="card-body text-capitalize">
            <form action="{{ route('name_edit_jenis', $jenis->id_jenis) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 row">
                    <label for="nama_barang" class="col-sm-2 col-form-label">Nama Jenis Barang</label>
                    <div class="col-sm-10">
                        <input name="nama_barang" value="{{$jenis->nama_barang}}" class="form-control" type="text" placeholder="Masukkan Nama Jenis Barang" id="nama_barang">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                    <div class="col-sm-10">
                        <input name="tarif" value="{{$jenis->tarif}}" class="form-control" type="text" placeholder="tarif" id="tarif">
                    </div>
                </div>
                <button type="submit" class="btn text-light" style="background-color: #fd7e14;">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
