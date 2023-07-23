@extends('layout.sidebar')
    @section('container')
    <div id="main" class="main">
      <div class="pagetitle">
            <h1>Form Input</h1>
              <nav>
                <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Form Input</li>
                </ol>
              </nav>
            </div>
                <!-- Multi Columns Form -->
            <div class="card">
              <div class="card-body">
              <h5 class="card-title">Form Input Data PPKS </h5>
                <form class="row g-3" enctype="multipart/form-data" method="POST" action="{{route('store_ppks')}}">
                  @csrf
                <div class="col-md-6">
                  <label for="inputNama" class="form-label">Nama Lengkap</label>
                  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="inputNama" value="{{old('nama')}}">
                  @error('nama')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label for="inputPassword5" class="form-label">NIK</label>
                  <input type="text" name="nik" class="form-control @error('nik') is-invalid @enderror" id="inputPassword5" value="{{old('nik')}}">
                  @error('nik')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6">
                <p> Jenis Kelamin </p>
                <select name="jk" class="form-control @error('jk') is-invalid @enderror">
                  <option value="" @if(old('jk') == '') selected @endif>Pilih...</option>
                  <option value="L" @if(old('jk') == 'L') selected @endif>Laki-laki</option>
                  <option value="P" @if(old('jk') == 'P') selected @endif>Perempuan</option>
                </select>
                  @error('jk')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6">
                  <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                  <input type="date" name="tanggal_lahir" id="tanggallahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" />
                  @error('tanggal_lahir')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
                <div class="col-md-6">
                <p>Pendidikan Terakhir </p>
                  <select name="pendidikan_terakhir" id="pendidikan_terakhir" class="form-control @error('pendidikan_terakhir') is-invalid @enderror">
                    <option value="" @if(old('pendidikan_terakhir') == '') selected @endif>Pilih...</option>
                    <option value="SD" @if(old('pendidikan_terakhir') == 'SD') selected @endif>SD</option>
                    <option value="SMP" @if(old('pendidikan_terakhir') == 'SMP') selected @endif>SMP</option>
                    <option value="SMA" @if(old('pendidikan_terakhir') == 'SMA') selected @endif>SMA/SMK</option>
                    <option value="Sarjana" @if(old('pendidikan_terakhir') == 'Sarjana') selected @endif>Diploma/Sarjana</option>
                    <option value="Lainnya" @if(old('pendidikan_terakhir') == 'Lainnya') selected @endif>Lainnya</option>
                  </select>

                  @error('pendidikan_terakhir')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror

                </div>
                <div class="col-md-6">
                  <label class="form-label" for="kecamatan">Kecamatan</label>
                  <select name="kecamatan" id="kecamatan" class="form-control @error('kecamatan') is-invalid @enderror">
                    <option value="">Silahkan Pilih Kecamatan anda</option>
                    @foreach ($kecamatan as $item)
                        <option value="{{$item->id_kecamatan}}" @if(old('kecamatan', $item->id_kecamatan) == '{{$item->id_kecamatan}}' ) selected @endif>{{$item->nama_kecamatan}} </option>
                    @endforeach
                  </select>

                  @error('kecamatan')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror

                </div>

                <div class="col-md-6" id="pendidikan_terakhir_2" hidden>
                <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir (Opsi Lainnya)</label>
                <input type="text" name="pendidikan_terakhir_2" class="form-control" placeholder="Isi Pendidikan Terakhir" />
                </div>

                <div class="col-md-6">
                <label class="form-label" for="desa_kelurahan">Desa/Kelurahan</label>
                <select name="kelurahan" id="kelurahan" class="form-control">
                  <option value="">Silahkan Pilih kelurahan anda</option>
                  @foreach ($kelurahan as $item)
                      <option value="{{$item->id_kelurahan}}">{{$item->nama_kelurahan}}</option>
                  @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                <label class="form-label" for="alamat">Alamat </label>
                <input type="text" id="alamat" name="alamat" class="form-control" />
                </div>
                <div class="col-md-6">
                <p>Jenis PPKS </p>
                  <select name="jenis_disabilitas" id="jenis_disabilitas" class="form-control">
                    <option>Pilih...</option>
                    @foreach ($jenis as $item)
                    <option value="{{$item->jenis_ppks_id}}">{{$item->nama_jenis}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                <p>Keterangan Kedisabilitasan </p>
                  <select name="ket_disabilitas" id="ket_disabilitas" class="form-control" disabled>
                    <option>Pilih...</option>
                    @foreach ($detail as $item)
                    <option value="{{$item->id_detail_ppks}}">{{$item->nama_detail_jenis}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                <p>Jaminan Kesehatan </p>
                  <select name="jamkes" class="form-control" id="jamkes">
                    <option value="">Pilih...</option>
                    <option value="Kartu Indonesia Sehat">Kartu Indonesia Sehat</option>
                    <option value="Jaminan Kesehatan Lainnya">Jaminan Kesehatan Lainnya</option>
                    <option value="PBI APBD/APBN">PBI APBD/APBN</option>
                    <option value="JAMKESOS">JAMKESOS</option>
                    <option value="">Tidak Memiliki Jaminan Kesehatan</option>
                  </select>
                </div>

                

                <div class="col-md-6">
                <p>Pekerjaan </p>
                  <select name="pekerjaan" class="form-control" id="pekerjaan">
                    <option value="">Pilih...</option>
                    <option value="Belum/Tidak Bekerja">Belum/Tidak Bekerja</option>
                    <option value="Mengurus rumah tangga">Mengurus rumah tangga</option>
                    <option value="Pelajar/Mahasisw">Pelajar/Mahasiswa</option>
                    <option value="Pensiunan">Pensiunan</option>
                    <option value="Pedagang">Pedagang</option>
                    <option value="Petani/pekebun">Petani/pekebun</option>
                    <option value="Peternak">Peternak</option>
                    <option value="Nelayan/perikanan">Nelayan/perikanan</option>
                    <option value="Buruh">Buruh</option>
                    <option value="Pembantu rumah tangga">Pembantu rumah tangga</option>
                    <option value="Tukang cukur, pijat,jahit,dll">Tukang cukur, pijat,jahit,dll</option>
                    <option value="Wiraswasta">Wiraswasta</option>
                    <option value="Karyawan">Karyawan</option>
                    <option value="Sopir/Tukang oje">Sopir/Tukang ojek</option>
                    <option value="Guru, Tenaga bantu non PNS">Guru, Tenaga bantu non PNS</option>
                    <option value="PNS">PNS</option>
                    <option value="Seniman">Seniman</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
                </div>

                <div class="col-md-6" id="jamkes2" hidden>
                <label class="form-label" for="jamkes2">Jaminan Kesehatan (Opsi Jaminan Kesehatan Lainnya) </label>
                <input type="text" id="jamkes2" name="jamkes2" placeholder="Isi Jaminan Kesehatan" class="form-control" />
                </div>

                <div class="col-md-6" id="pekerjaan2" hidden>
                <label class="form-label" for="pekerjaan">Pekerjaan (Opsi Lainnya) </label>
                <input type="text" id="pekerjaan" name="pekerjaan2" placeholder="Isi Pekerjaan" class="form-control" />
                </div>

                <div class="col-md-12">
                <label for="inputNama" class="form-label">Foto PPKS</label>
                <input type="file" class="form-control" name="foto_ppks" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto')}}">
                </div>

                <div class="col-md-12">
                  <label for="inputNama" class="form-label">Foto Luar</label>
                  <input type="file" class="form-control" name="foto_luar" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto')}}">
                  </div>

                  <div class="col-md-12">
                    <label for="inputNama" class="form-label">Foto Dalam</label>
                    <input type="file" class="form-control" name="foto_dalam" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto')}}">
                    </div>

                <div class="col-md-12">
                <label class="form-label" for="keterangan">Keterangan </label>
                <textarea name="keterangan" rows="5" class="form-control"></textarea>
                </div>
                <div class="col-12">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                      Check me out
                    </label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form>
          </div>
        </div>
       <!-- End Multi Columns Form -->
    </div> 
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
    <script>
      $(document).ready(function() {
          $('#jenis_disabilitas').change(function() {
              if ($(this).val() == 4 || $(this).val() == 6) {
                  $('#ket_disabilitas').prop('disabled', false);
              } else {
                  $('#ket_disabilitas').prop('disabled', true);
              }
          });
      });

      $("#pekerjaan").change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == "Lainnya") {
          $('#pekerjaan2').prop('hidden', false);
        }else{
          $('#pekerjaan2').prop('hidden', true);
        }
      });

      $("#jamkes").change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == "Jaminan Kesehatan Lainnya") {
          $('#jamkes2').prop('hidden', false);
        } else{
          $('#jamkes2').prop('hidden', true);
        }
      });

      $("#pendidikan_terakhir").change(function() {
        var selectedValue = $(this).val();
        if (selectedValue == "Lainnya") {
          $('#pendidikan_terakhir_2').prop('hidden', false);
        } else{
          $('#pendidikan_terakhir_2').prop('hidden', true);
        }
      });
      
    </script>
    @endsection