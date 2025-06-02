@extends('templating.master')

@section('judul_halaman', 'Detail Transaksi | SelSil Laundry')

@section('konten')


<div class="container">
    <h1 style="color: #0D1B2A;">Detail Transaksi</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/data_transaksi') }}" style="color: #F4A261;">Transaksi</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>  

   
    
    <div class="row">
        <!-- Informasi Transaksi -->
        <div class="col-md-6">
            <div class="card" style="border-color: #0D1B2A;">
                <div class="card-header bg-dark text-white">
                    Informasi Transaksi
                </div>
                <div class="card-body">
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
                    <p><strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</p>
                    <p><strong>No. HP:</strong> {{ $transaksi->pelanggan->no_telp ?? '-' }}</p>
                    <p><strong>Alamat Pelanggan:</strong> {{ $transaksi->pelanggan->alamat ?? '-' }}</p>
                    <p><strong>Nama Karyawan:</strong> {{ $transaksi->karyawan->nama_karyawan ?? '-' }}</p>
                </div>
            </div>
        </div>

        <!-- Detail Pembayaran -->
        <div class="col-md-6">
            <div class="card" style="border-color: #0D1B2A;">
                <div class="card-header bg-dark text-white">
                    Detail Pembayaran
                </div>
                <div class="card-body">
                    <p><strong>Status Cucian:</strong> {{ $transaksi->status_cucian }}</p>
                    <p><strong>Jumlah Bayar:</strong> {{ 'Rp' . number_format($transaksi->jumlah_bayar, 0, ',', '.') }}</p>
                    <p><strong>Kembalian:</strong> {{ 'Rp' . number_format($transaksi->kembalian, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4 " style="border-color: #0D1B2A;">
        <div class="card-header bg-dark text-white">
            Rincian Barang
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead style="background-color: #0D1B2A; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Jenis Barang</th>
                        <th>Berat (Kg)</th>
                        <th>Tarif/Kg (Rp)</th>
                        <th>Subtotal (Rp)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                        $tarif = $transaksi->jenisBarang->tarif ?? 0;
                        $berat = $transaksi->berat_barang ?? 0;
                        $subtotal = $tarif * $berat;
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>1</td>
                        <td>{{ $transaksi->jenisBarang->nama_barang ?? '-' }}</td>
                        <td>{{ number_format($berat, 2, ',', '.') }}</td>
                        <td>{{ 'Rp' . number_format($tarif, 0, ',', '.') }}</td>
                        <td>{{ 'Rp' . number_format($subtotal, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td><strong>{{ 'Rp' . number_format($total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>



    <div class="my-4 d-flex justify-content-between">
        <a href="{{ url('/data_transaksi') }}" class="btn btn-secondary">
            <i class="fas fa-long-arrow-alt-left"></i> Kembali ke Data Transaksi
        </a>

        <a href="{{ url('/cetak_struk/' . $transaksi->id) }}" class="btn btn-success" target="_blank">
            <i class="fas fa-receipt pe-1"></i>Cetak Struk
        </a>
    </div>
@endsection
