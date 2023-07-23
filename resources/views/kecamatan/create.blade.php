
@extends('layout.sidebar')

@section('container')
    <div class="container">
        <h1>Tambah Kecamatan</h1>
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('kecamatan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_kecamatan" class="form-label">Nama Kecamatan</label>
                <input type="text" class="form-control" id="nama_kecamatan" name="nama_kecamatan" value="{{ old('nama_kecamatan') }}" required>
            </div>
            <div class="mb-3">
                <label for="desa_kelurahan" class="form-label">Desa/Kelurahan</label>
                <input type="text" class="form-control" id="desa_kelurahan" name="desa_kelurahan" value="{{ old('desa_kelurahan') }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
                <textarea class="form-control" id="alamat_lengkap" name="alamat_lengkap" rows="3" required>{{ old('alamat_lengkap') }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
