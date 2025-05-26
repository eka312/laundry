@extends('templating.master')

@section('judul_halaman', ' Tambah Data Karyawan |  SelSil Laundry')

@section('konten')
<div class="container text-capitalize" style="background-color: #fef7f1; padding: 2rem; border-radius: 10px;">
    <h1 class="mt-4 text-dark">tambah data karyawan</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/data_karyawan" class="text-primary">Data Karyawan</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Tambah Data Karyawan</li>
        </ol>
    </nav>

    <div class="card mb-4" style="background-color: #e1e9f1;">
        <div class="card-header text-light" style="background-color: #002f5f;">
            <i class="fas fa-plus me-1"></i>
            Tambah Data Karyawan
        </div>
        <div class="card-body text-capitalize">
            <form action="/tambah_karyawan" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4 row">
                    <label for="nama_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <input name="nama_karyawan" class="form-control" type="text" placeholder="Masukkan Nama Karyawan" id="nama_karyawan">
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="no_telp_karyawan" class="col-sm-2 col-form-label">Nomor Telp Karyawan</label>
                    <div class="col-sm-10">
                        <input name="no_telp_karyawan" class="form-control" type="text" placeholder="Masukkan Nomor Telp" id="no_telp_karyawan">
                    </div>
                </div>
                <button type="submit" class="btn text-light" style="background-color: #fd7e14;">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
