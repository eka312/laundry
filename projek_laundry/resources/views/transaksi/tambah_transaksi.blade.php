@extends('templating.master')
@section('judul_halaman', 'Tambah Transaksi | SelSil Laundry')

@section('konten')
<div class="container text-capitalize" style="background-color: #ffffff; padding: 2rem; border-radius: 10px;">
    <h1 class="mt-4 text-dark">tambah transaksi</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/data_transaksi" class="text-primary">Data Transaksi</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Tambah Transaksi</li>
        </ol>
    </nav>

    <div class="card mb-4" style="background-color:rgb(234, 238, 243);">
        <div class="card-header text-light" style="background-color: #002f5f;">
            <i class="fas fa-plus me-1"></i>
            Tambah Transaksi
        </div>
        <div class="card-body text-capitalize">
            <form action="{{ route('transaksi.tambah_transaksi') }}" method="POST">
                @csrf

                <div class="mb-4 row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <select name="id_karyawan" id="id_karyawan" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Karyawan --</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id_karyawan }}">{{ $k->nama_karyawan }}</option>


                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-4 row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-10">
                        <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Pelanggan --</option>
                            @foreach ($pelanggan as $p)
                                <option value="{{ $p->id_pelanggan }}">{{ $p->nama_pelanggan }}</option>

                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="id_jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <select name="id_jenis" id="id_jenis" class="form-select" required>
                            <option value="" disabled selected>-- Pilih Jenis Barang --</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id_jenis }}">{{ $j->nama_barang }} (Rp {{ number_format($j->tarif, 0, ',', '.') }} / kg)</option>

                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="mb-4 row">
                    <label for="berat_barang" class="col-sm-2 col-form-label">Berat Barang (kg)</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" min="0.01" name="berat_barang" id="berat_barang" class="form-control" placeholder="Masukkan berat barang" required>
                    </div>
                </div>

                <div class="mb-4 row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn text-light" style="background-color: #fd7e14;">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                        <a href="/data_transaksi" class="btn btn-secondary ms-2">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
