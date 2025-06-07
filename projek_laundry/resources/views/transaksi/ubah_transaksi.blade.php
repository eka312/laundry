@extends('templating.master')
@section('judul_halaman', 'Ubah Data Transaksi | SelSil Laundry')

@section('konten')
<div class="container text-capitalize" style="background-color: #fef7f1; padding: 2rem; border-radius: 10px;">
    <h1 class="mt-4 text-dark">ubah data transaksi</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/data_transaksi" class="text-primary">Data Transaksi</a></li>
            <li class="breadcrumb-item active text-dark" aria-current="page">Ubah Data Transaksi</li>
        </ol>
    </nav>

    <div class="card mb-4" style="background-color: #e1e9f1;">
        <div class="card-header text-light" style="background-color: #002f5f;">
            <i class="fas fa-edit me-1"></i>
            Ubah Data Transaksi
        </div>
        <div class="card-body text-capitalize">

            <form action="{{ route('name_edit_transaksi', $transaksi->id_transaksi) }}" method="POST">
                @csrf
                <div class="mb-4 row">
                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('Y-m-d') }}" required>
                    </div>
                </div>
                <div class="mb-4 row">
                    <label for="id_karyawan" class="col-sm-2 col-form-label">Nama Karyawan</label>
                    <div class="col-sm-10">
                        <select name="id_karyawan" id="id_karyawan" class="form-select" required>
                            <option value="" disabled>-- Pilih Karyawan --</option>
                            @foreach ($karyawan as $k)
                                <option value="{{ $k->id_karyawan }}" {{ $k->id_karyawan == $transaksi->id_karyawan ? 'selected' : '' }}>
                                    {{ $k->nama_karyawan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="id_pelanggan" class="col-sm-2 col-form-label">Nama Pelanggan</label>
                    <div class="col-sm-10">
                        <select name="id_pelanggan" id="id_pelanggan" class="form-select" required>
                            <option value="" disabled>-- Pilih Pelanggan --</option>
                            @foreach ($pelanggan as $p)
                                <option value="{{ $p->id_pelanggan }}" {{ $p->id_pelanggan == $transaksi->id_pelanggan ? 'selected' : '' }}>
                                    {{ $p->nama_pelanggan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="id_jenis" class="col-sm-2 col-form-label">Jenis Barang</label>
                    <div class="col-sm-10">
                        <select name="id_jenis" id="id_jenis" class="form-select" required>
                            <option value="" disabled>-- Pilih Jenis Barang --</option>
                            @foreach ($jenis as $j)
                                <option value="{{ $j->id_jenis }}" {{ $j->id_jenis == $transaksi->id_jenis ? 'selected' : '' }}>
                                    {{ $j->nama_barang }} (Rp {{ number_format($j->tarif, 0, ',', '.') }} / kg)
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-4 row">
                    <label for="berat_barang" class="col-sm-2 col-form-label">Berat Barang (kg)</label>
                    <div class="col-sm-10">
                        <input type="number" step="0.01" min="0.01" name="berat_barang" id="berat_barang" class="form-control" placeholder="Masukkan berat barang" value="{{ $transaksi->berat_barang }}" required>
                    </div>
                </div>

                {{-- Tambahan: Status Cucian --}}
                <div class="mb-4 row">
                    <label for="status_cucian" class="col-sm-2 col-form-label">Status Cucian</label>
                    <div class="col-sm-10">
                        <select name="status_cucian" id="status_cucian" class="form-select" required>
                            <option value="Dalam Proses" {{ $transaksi->status_cucian == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                            <option value="Selesai" {{ $transaksi->status_cucian == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Sudah Diambil" {{ $transaksi->status_cucian == 'Sudah Diambil' ? 'selected' : '' }}>Sudah Diambil</option>
                        </select>
                    </div>
                </div>

                {{-- Tambahan: Jumlah Bayar --}}
                <div class="mb-4 row">
                    <label for="jumlah_bayar" class="col-sm-2 col-form-label">Jumlah Bayar</label>
                    <div class="col-sm-10">
                        <input type="number" name="jumlah_bayar" id="jumlah_bayar" class="form-control" placeholder="Masukkan jumlah bayar" value="{{ $transaksi->jumlah_bayar }}" required>
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
