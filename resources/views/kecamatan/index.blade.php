@extends('layout.sidebar')

@section('container')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="mb-3">
            <a href="{{ route('kecamatan.create') }}" class="btn btn-primary">Tambah Kecamatan</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Kecamatan</th>
                    <th>Desa/Kelurahan</th>
                    <th>Alamat Lengkap</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kecamatans as $kecamatan)
                    <tr>
                        <td>{{ $kecamatan->kecamatan_id }}</td>
                        <td>{{ $kecamatan->nama_kecamatan }}</td>
                        <td>{{ $kecamatan->desa_kelurahan }}</td>
                        <td>{{ $kecamatan->alamat_lengkap }}</td>
                        <td>
                            {{-- <a href="{{ route('kecamatan.edit', $kecamatan) }}" class="btn btn-primary btn-sm">Edit</a> --}}
                            <a href="" class="btn btn-primary btn-sm">Edit</a>
                            <form action="" method="POST" class="d-inline">
                                {{-- <form action="{{ route('kecamatan.destroy', $kecamatan) }}" method="POST" class="d-inline"> --}}
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kecamatan ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection