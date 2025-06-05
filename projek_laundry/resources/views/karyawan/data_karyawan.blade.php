@extends('templating.master')

@section('judul_halaman', 'Data Karyawan |  SelSil Laundry')

@section('konten')
<div class="container">
    <h1 style="color: #0D1B2A;">Data Karyawan</h1> {{-- biru dongker --}}
    @php
        $path = request()->path(); // contoh: 'data_karyawan', 'tambah_karyawan', 'ubah_karyawan/5'
    @endphp

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if (Str::contains($path, 'karyawan'))
                @if ($path === 'data_karyawan')
                    <li class="breadcrumb-item active" aria-current="page">Data Karyawan</li>
                @else
                    <li class="breadcrumb-item">
                        <a href="{{ url('/data_karyawan') }}" style="color: #F4A261;">Data Karyawan</a>
                    </li>
                @endif

                @if ($path === 'tambah_karyawan')
                    <li class="breadcrumb-item active" aria-current="page">Tambah Karyawan</li>
                @elseif (Str::startsWith($path, 'ubah_karyawan'))
                    <li class="breadcrumb-item active" aria-current="page">Ubah Karyawan</li>
                @endif
            @endif
        </ol>
    </nav> 
    
    <div class="card mb-4 text-capitalize" style="border-color:rgb(36, 60, 87);"> {{-- biru dongker border --}}
        <div class="card-header" style="background-color: #0D1B2A; color: white;"> {{-- header biru dongker --}}
            <div class="d-flex">
                <div class="flex-grow-1 d-flex align-items-center">
                    <i class="fas fa-table me-1"></i>
                    Daftar Data Karyawan
                </div>
                <div>
                    <a class="btn btn-sm" href="/tambah_karyawan" role="button" style="background-color: #F4A261; color: white;"> {{-- tombol orange --}}
                        <i class="fas fa-add me-2"></i>Tambah
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple" style="border: 1px solid #0D1B2A;"> {{-- border biru dongker --}}
                <thead > {{-- header tabel biru dongker --}}
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>No Telp Karyawan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($karyawan as $item)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td>{{$item->nama_karyawan}}</td>
                            <td>{{$item->no_telp_karyawan}}</td>
                            <td>
                                <a href="/ubah_karyawan/{{$item->id_karyawan}}" role="button" class="btn btn-sm m-1" style="background-color: #F4A261; color: white; margin-bottom: 5px;">
                                    <i class="fas fa-edit me-2"></i>Ubah
                                </a>
                                <a href="/hapus_karyawan/{{$item->id_karyawan}}" onclick="return confirm('apakah anda yakin ingin menghapus data ini?');" role="button" class="btn btn-sm" style="background-color: #E63946; color: white;">
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
