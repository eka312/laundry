@extends('templating.master')

@section('judul_halaman', 'Tambah Data Transaksi | SelSil Laundry')

@section('konten')
<div class="container text-capitalize" style="background-color: #fef7f1; padding: 2rem; border-radius: 10px;">
    <h1 class="mt-4 text-dark">tambah data transaksi</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/data_transaksi" class="text-primary">Data Transaksi</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Tambah Data Transaksi</li>
        </ol>
    </nav>

    <div class="card mb-4" style="background-color: #e1e9f1;">
        <div class="card-header text-light" style="background-color: #002f5f;">
            <i class="fas fa-plus me-1"></i>
            Tambah Data Transaksi
        </div>
        <div class="card-body text-capitalize">
           <form action="{{ route('transaksi.store') }}" method="POST">
                @csrf

                {{-- ID Karyawan --}}
                <div class="mb-4 row">
                    <label for="id_karyawan" class="col-sm-2 col-form-label">Karyawan</label>
                    <div class="col-sm-10">
                        <select name="id_karyawan" class="form-select" required>
                            <option disabled selected>-- Pilih Karyawan --</option>
                            @foreach($karyawan as $data_karyawan)
                                <option value="{{ $data_karyawan->id_karyawan }}" {{ old('id_karyawan') == $data_karyawan->id_karyawan ? 'selected' : '' }}>
                                    {{ $data_karyawan->nama_karyawan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- ID Pelanggan --}}
                <div class="mb-4 row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">Pelanggan</label>
                    <div class="col-sm-10">
                        <select name="id_pelanggan" class="form-select" required>
                            <option disabled selected>-- Pilih Pelanggan --</option>
                            @foreach($pelanggan as $data_pelanggan)
                                <option value="{{ $data_pelanggan->id_pelanggan }}" {{ old('id_pelanggan') == $data_pelanggan->id_pelanggan ? 'selected' : '' }}>
                                    {{ $data_pelanggan->nama_pelanggan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- ID Jenis --}}
                <div class="mb-4 row">
                    <label for="id_jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <select name="id_jenis" class="form-select" required>
                            <option disabled selected>-- Pilih Jenis --</option>
                            @foreach($jenis as $data_jenis)
                                <option value="{{ $data_jenis->id_jenis }}" {{ old('id_jenis') == $data_jenis->id_jenis ? 'selected' : '' }}>
                                    {{ $data_jenis->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Tarif --}}
                <div class="mb-4 row">
                    <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                    <div class="col-sm-10">
                        <input type="number" name="tarif" id="tarif" class="form-control" value="{{ old('tarif', $tarif ?? '') }}" placeholder="Tarif akan muncul setelah pilih jenis" readonly>
                    </div>
                </div>

                <button type="submit" class="btn text-light" style="background-color: #fd7e14;">Simpan</button>
            </form>

        </div>
    </div>
</div>
@endsection
