@extends('templating.master')

@section('judul_halaman', 'Data Transaksi | SelSil Laundry')

@section('konten')
<div class="container">
    <h1 style="color: #0D1B2A;">Transaksi</h1>
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="{{ url('/data_transaksi') }}" style="color: #F4A261;">Transaksi</a>
            </li>
        </ol>
    </nav>   
    
    <div class="card mb-4 text-capitalize" style="border-color: #0D1B2A;">
        <div class="card-header" style="background-color: #0D1B2A; color: white;">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Daftar Data Transaksi
                </div>
                <div>
                    <a class="btn btn-sm" href="{{ url('/tambah_transaksi') }}" role="button" style="background-color: #F4A261; color: white;">
                        <i class="fas fa-plus me-2"></i>Tambah
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" class="table table-bordered table-striped" style="border: 1px solid #0D1B2A;">
                <thead style="background-color: #0D1B2A; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Karyawan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Barang</th>
                        <th>Berat (kg)</th>
                        <th>Total (Rp)</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($transaksis as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td>{{ $item->karyawan->nama_karyawan ?? '-' }}</td>
                            <td>{{ $item->pelanggan->nama_pelanggan ?? '-' }}</td>
                            <td>{{ $item->jenisBarang->nama_barang ?? '-' }}</td>
                            <td>{{ number_format($item->berat_barang ?? 0, 2, ',', '.') }}</td>
                            <td>
                                @php
                                    $total = 0;
                                    if ($item->jenisBarang) {
                                        $total = $item->berat_barang * $item->jenisBarang->tarif;
                                    }
                                @endphp
                                {{ 'Rp' . number_format($total, 0, ',', '.') }}
                            </td>
                            <td>
                                <a href="{{ route('name_edit_transaksi', $item->id_transaksi) }}" class="btn btn-sm" style="background-color: #F4A261; color: white;">
                                    <i class="fas fa-edit me-2"></i>Ubah
                                </a>

                                <form action="{{ route('transaksi.destroy', $item->id_transaksi) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm" style="background-color: #E63946; color: white;" onclick="return confirm('Yakin hapus data?');">
                                        <i class="fas fa-trash me-2"></i>Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data transaksi belum tersedia.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
