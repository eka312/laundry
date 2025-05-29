@extends('templating.master')

@section('judul_halaman', 'Data Transaksi |  SelSil Laundry')

@section('konten')
<div class="container">
    <h1 style="color: #0D1B2A;">Transaksi</h1> {{-- biru dongker --}}
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="/data_transaksi" style="color: #F4A261;">Transaksi</a> {{-- orange --}}
            </li>
        </ol>
    </nav>   
    
    <div class="card mb-4 text-capitalize" style="border-color: #0D1B2A;"> {{-- biru dongker border --}}
        <div class="card-header" style="background-color: #0D1B2A; color: white;"> {{-- header biru dongker --}}
            <div class="d-flex">
                <div class="flex-grow-1 d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Daftar Data Transaksi
                </div>
                <div>
                    <a class="btn btn-sm" href="/tambah_transaksi" role="button" style="background-color: #F4A261; color: white;"> {{-- tombol orange --}}
                        <i class="fas fa-add me-2"></i>Tambah
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" style="border: 1px solid #0D1B2A;"> {{-- border biru dongker --}}
                <thead style="background-color: #0D1B2A; color: white;">
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Nama Pelanggan</th>
                        <th>Jenis Barang</th>
                        <th>Tarif</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->karyawan->nama ?? '-' }}</td>
                            <td>{{ $item->pelanggan->nama ?? '-' }}</td>
                            <td>{{ $item->jenisBarang->nama_barang ?? '-' }}</td>
                            <td>{{ 'Rp' . number_format($item->jenisBarang->tarif ?? 0, 0, ',', '.') }}</td>
                            <td>
                                <a href="/transaksi/{{$item->id}}/edit" class="btn btn-sm" style="background-color: #F4A261; color: white;">
                                    <i class="fas fa-edit me-2"></i>Ubah
                                </a>
                                <a href="/transaksi/{{$item->id}}/hapus" onclick="return confirm('Yakin hapus data?');" class="btn btn-sm" style="background-color: #E63946; color: white;">
                                    <i class="fas fa-trash me-2"></i>Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>
@endsection
