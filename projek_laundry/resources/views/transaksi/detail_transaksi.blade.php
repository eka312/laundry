@extends('templating.master')

@section('judul_halaman', 'Detail Transaksi | SelSil Laundry')

@section('konten')



<div class="container">
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

    <div class="card mt-4" style="border-color: #0D1B2A;">
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
                    @endphp
                    <tr>
                        <td>1</td>
                        <td>{{ $transaksi->jenisBarang->nama_barang ?? '-' }}</td>
                        <td>{{ number_format($berat, 2, ',', '.') }}</td>
                        <td>{{ 'Rp' . number_format($tarif, 0, ',', '.') }}</td>
                        <td>{{ 'Rp' . number_format($transaksi->total, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-end"><strong>Total</strong></td>
                        <td><strong>{{ 'Rp' . number_format($transaksi->total, 0, ',', '.') }}</strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        /* CSS khusus saat print */
        @media print {
            /* Sembunyikan tombol dan link pada saat cetak */
            .no-print {
                display: none !important;
            }
        }
    </style>

    <div class="my-4 d-flex justify-content-between no-print">
        <a href="{{ url('/data_transaksi') }}" class="btn btn-secondary">
            <i class="fas fa-long-arrow-alt-left"></i> Kembali ke Data Transaksi
        </a>

        <!-- Tombol print yang langsung memanggil window.print() -->
        <button onclick="window.print()" class="btn btn-success">
            <i class="fas fa-print pe-1"></i> Cetak Struk
        </button>
    </div>

</div>

@endsection
