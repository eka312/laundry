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

        <!-- Tombol buka modal cetak -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalStruk">
            <i class="fas fa-print pe-1"></i> Cetak Struk
        </button>
    </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="modalStruk" tabindex="-1" aria-labelledby="modalStrukLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
    <div class="modal-content">

      <div class="modal-header bg-dark text-white">
        <h5 class="modal-title" id="modalStrukLabel">Struk Pembayaran Laundry</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" id="printArea" style="font-family: monospace; font-size: 10px; line-height: 1.3; white-space: nowrap;">

        <p class="text-center" style="font-weight: bold; font-size: 12px;">SelSil Laundry</p>
        <p class="text-center" style="font-size: 9px; margin-top: -10px;">Jl. Contoh No.123, Kota Malang</p>
        <hr style="border-top: 1px dashed #000; margin: 8px 0;">

        <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</p>
        <p><strong>Nama Pelanggan:</strong> {{ $transaksi->pelanggan->nama_pelanggan ?? '-' }}</p>
        <p><strong>No. HP:</strong> {{ $transaksi->pelanggan->no_telp ?? '-' }}</p>
        <p><strong>Alamat Pelanggan:</strong> {{ $transaksi->pelanggan->alamat ?? '-' }}</p>
        <p><strong>Nama Karyawan:</strong> {{ $transaksi->karyawan->nama_karyawan ?? '-' }}</p>
        <hr style="border-top: 1px dashed #000; margin: 8px 0;">

        <p><strong>Status Cucian:</strong> {{ $transaksi->status_cucian }}</p>
        <p><strong>Jumlah Bayar:</strong> {{ 'Rp' . number_format($transaksi->jumlah_bayar, 0, ',', '.') }}</p>
        <p><strong>Kembalian:</strong> {{ 'Rp' . number_format($transaksi->kembalian, 0, ',', '.') }}</p>
        <hr style="border-top: 1px dashed #000; margin: 8px 0;">

        <div>
            <p style="font-weight: bold; margin-bottom: 5px;">Rincian Barang:</p>
            <div style="display: grid; grid-template-columns: 20px 100px 50px 60px 70px; gap: 4px; font-size: 9px;">
                <div style="font-weight: bold;">No</div>
                <div style="font-weight: bold;">Jenis Barang</div>
                <div style="font-weight: bold;">Berat</div>
                <div style="font-weight: bold;">Tarif</div>
                <div style="font-weight: bold; text-align: right;">Subtotal</div>

                <div>1</div>
                <div>{{ $transaksi->jenisBarang->nama_barang ?? '-' }}</div>
                <div>{{ number_format($berat, 2, ',', '.') }}</div>
                <div>{{ 'Rp' . number_format($tarif, 0, ',', '.') }}</div>
                <div style="text-align: right;">{{ 'Rp' . number_format($subtotal, 0, ',', '.') }}</div>
            </div>
            <div style="display: flex; justify-content: flex-end; font-weight: bold; margin-top: 8px; font-size: 10px;">
                Total: {{ 'Rp' . number_format($total, 0, ',', '.') }}
            </div>
        </div>

        <hr style="border-top: 1px dashed #000; margin: 8px 0;">
        <p class="text-center" style="font-size: 10px;">Terima kasih atas kepercayaan Anda!</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="printStruk()">
            <i class="fas fa-print"></i> Print Struk
        </button>
      </div>
    </div>
  </div>
</div>

<!-- CSS khusus untuk print -->
<style>
  @media print {
    body * {
      visibility: hidden;
    }
    #printArea, #printArea * {
      visibility: visible;
    }
    #printArea {
      position: absolute;
      left: 0;
      top: 0;
      width: 230px;
      font-family: monospace;
      font-size: 10px;
      padding: 8px;
      background: white;
      white-space: nowrap;
    }
    hr {
      border: none;
      border-top: 1px dashed #000;
      margin: 8px 0;
    }
  }
</style>

<!-- Script untuk print isi modal -->
<script>
    function printStruk() {
        var printContents = document.getElementById('printArea').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
        location.reload();
    }
</script>
@endsection
