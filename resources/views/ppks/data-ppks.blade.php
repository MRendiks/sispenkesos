@extends('layout.sidebar')
    @section('container')
    <div id="main" class="main">
        <h1 class="mt-4"><div class="sb-nav-link-icon">
        <span class="material-symbols-outlined">
            {{$page}}</h1>
            
    
        <section class="section">
          <div class="row">

            <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">{{$grafik1}}</h5>
                      <div id="pieChart"></div>

                      <script>

                      </script>
                      <!-- End Pie Chart -->

                  </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title"> {{$grafik2}} </h5>
                      <div id="donutChart"></div>
                      <!-- End Pie Chart -->

                  </div>
              </div>
            </div>
          </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>   
      <script>
        // variabel grafik data pertama
        var data = @json($presentase);
        // variabel grafik data kedua
        var data2 = @json($presentase2);

        // Data Untuk Grafik pertama
        var nama_jenis = [];
        var banyak_data = [];

        // Data untuk grafik kedua
        var nama_kecamatan = [];
        var banyak_data2 = [];
        
            
        data.forEach(function(item) {
          nama_jenis.push(item['nama_jenis']);
          banyak_data.push(item['banyak_data']);
        });

        data2.forEach(function(item) {
          nama_kecamatan.push(item['nama_kecamatan']);
          banyak_data2.push(item['banyak_data']);
        });

        if (data == null) {

        }else{
          document.addEventListener("DOMContentLoaded", () => {
              new ApexCharts(document.querySelector("#pieChart"), {
                series: banyak_data,
                chart: {
                  height: 350,
                  type: 'pie',
                  toolbar: {
                    show: true
                  }
                },
                labels: nama_jenis
              }).render();
            });

            document.addEventListener("DOMContentLoaded", () => {
              new ApexCharts(document.querySelector("#donutChart"), {
                series: banyak_data2,
                chart: {
                  height: 350,
                  type: 'pie',
                  toolbar: {
                    show: true
                  }
                },
                labels: nama_kecamatan
              }).render();
            });

        }

        
        
      </script>  
        <!-- End Page Title -->
        <section class="section dashboard mt-5">
          

          <div class="row">
                <!-- Recent Sales -->
                <div class="col-12">
                  <div class="card recent-sales overflow-auto">
    
                    <div class="filter">
                      <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                          <h6>Filter Data</h6>
                        </li>

                        @if ($title == "Data PPKS")
                          <li>
                            <a class="dropdown-item" href="/data-ppks">All</a> 
                          </li>
                        @else
                          @if ($title == "Data Disabilitas" || $title == "Data Kedisabilitasan")
                          <li>
                            <a class="dropdown-item" href="/filter_data/{{$id}}/0">All</a> 
                          </li>
                          @else
                          <li>
                            <a class="dropdown-item" href="/filter_data/{{$id}}/400">All</a> 
                          </li>
                          @endif
                        @endif
                          </form>
                        </li>
                        @foreach ($kecamatan as $item)
                          
                            @if ($title == "Data PPKS")
                              <li>
                                <a class="dropdown-item" href="/filter_data_ppks/{{$item->id_kecamatan}}">{{$item->nama_kecamatan}}</a>
                              </li>
                            @else
                              @if ($title == "Data Disabilitas" || $title == "Data Kedisabilitasan")
                              <li>
                                <a class="dropdown-item" href="/filter_data/{{$id}}/{{$item->id_kecamatan}}">{{$item->nama_kecamatan}}</a>
                              </li>
                              @else
                              <li>
                                <a class="dropdown-item" href="/filter_data/{{$id}}/{{$item->id_kecamatan}}">{{$item->nama_kecamatan}}</a>
                              </li>
                              @endif
                            @endif
                        @endforeach
                        

                      </ul>
                    </div>
    
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title">{{$tabel}} </h5>
                        <div>
                          {{-- @if ($title == "Data PPKS") --}}
                            <a href="{{route('excel_all')}}" class="btn btn-sm btn-success mt-3" style="width: 150px; height: 40px;">Cetak Excel</a>
                            <a href="/cetak_laporan" class="btn btn-sm btn-warning mt-3" style="width: 150px; height: 40px;">Cetak Laporan</a>
                          {{-- @else --}}
                            {{-- @if ($title == "Data Disabilitas" || $title == "Data Kedisabilitasan") --}}
                          {{-- @endif --}}
                          
                        </div>
                        
                      </div>
                      <table class="table datatable">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Pendidikan Ditamatkan</th>
                            <th>Kecamatan</th>
                            <th>Jenis PPKS</th>
                            @if (($title == "Data Disabilitas") || ($title == "Data Kedisabilitasan"))
                            <th>Detail Disabilitas</th>
                            @endif
                            <th>Jaminan Kesehatan </th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ppks as $item)
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$item->nama}} </td>
                                    <td> {{$item->nik}} </td>
                                    <td> {{$item->jenis_kelamin}} </td>
                                    <td> {{$item->tanggal_lahir}} </td>
                                    <td> {{$item->pendidikan}} </td>
                                    <td> {{$item->nama_kecamatan}} </td>
                                    <td> {{$item->nama_jenis}} </td>
                                    @if (($title == "Data Disabilitas") || ($title == "Data Kedisabilitasan"))
                                    <td> {{$item->nama_detail_jenis}}</td>
                                    @endif
                                    <td> {{$item->jaminan_kesehatan}} </td>
                                    <td> {{$item->pekerjaan}} </td>
                                    <td> 
                                      @if ($item->status == "verifikasi")
                                          <button class="btn btn-warning">{{$item->status}}</button>
                                      @else
                                          <button class="btn btn-success">{{$item->status}}</button>
                                      @endif
                                      </td>
                                    <td>
                                        <ul class="d-flex align-items-center">

                                    
                                            <li class="nav-item nav-profile dropdown" style="list-style-type: none;">
                                    
                                              <a class="btn btn-primary d-flex align-items-center" href="#" data-bs-toggle="dropdown">
                                                Opsi
                                              </a>
                                    
                                              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center" data-bs-toggle="modal" data-bs-target="#detailData{{$item->id}}">
                                                      {{-- <a class="dropdown-item d-flex align-items-center" href="/detail_data/{{$item->id}}"> --}}
                                                      <i class="bi bi-book"></i>
                                                      <span>Detail</span>
                                                    </a>
                                                  </li>
                                                <li>
                                                  <a class="dropdown-item d-flex align-items-center" href="/forminput">
                                                    <i class="bi bi-plus-circle-dotted"></i>
                                                    <span>Tambah</span>
                                                  </a>
                                                </li>
                                                <li>
                                                  <hr class="dropdown-divider">
                                                </li>
                                    
                                                <li>
                                                  <a class="dropdown-item d-flex align-items-center"  data-bs-toggle="modal" data-bs-target="#updateData{{$item->id}}">
                                                    <i class="bi bi-pencil-square"></i>
                                                    <span>Edit</span>
                                                  </a>
                                                </li>
                                                <li>
                                                  <hr class="dropdown-divider">
                                                </li>
                                    
                                                <li>
                                                  <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                                    <i class="bi bi-eraser-fill"></i>
                                                    <span>
                                                      <form id="deleteKeg" onclick="confirm('Apakah Anda Yakin untuk Menghapus Data ini ? ')" action="/{{ $item->id }}/delete_data" method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" style="background-color: transparent;
                                                        border: none;
                                                        padding: 0;
                                                        font-size: inherit;
                                                        color: inherit;">
                                                        Hapus
                                                        </button>
                                                      </form>
                                                      
                                                    </span>
                                                  </a>
                                                </li>
                                                <li>
                                                  <hr class="dropdown-divider">
                                                </li>
                                    
                                              </ul><!-- End Profile Dropdown Items -->
                                            </li><!-- End Profile Nav -->
                                    
                                          </ul>
                                    </td>
                                </tr>

                                <div class="modal fade col-md-8" id="updateData{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="updateDataLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <center><h4 class="modal-title" id="updateDataLabel">Update Data PPKS</h4></center>
                                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          <form action="/{{ $item->id }}/update_data" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                              
                                            <div class="card">
                                              <div class="card-body">
                                              <h5 class="card-title">Update Data PPKS </h5>
                                                  @csrf
                                                <div class="col-md-12">
                                                  <label for="inputNama" class="form-label">Nama Lengkap</label>
                                                  <input type="text" name="nama" class="form-control" id="inputEmail5" value="{{$item->nama}}">
                                                </div>
                                                <div class="col-md-12">
                                                  <label for="inputPassword5" class="form-label">NIK</label>
                                                  <input type="text" name="nik" class="form-control" id="inputPassword5" value="{{$item->nik}}">
                                                </div>
                                                <div class="col-md-12">
                                                <p> Jenis Kelamin </p>
                                                <select name="jk" class="form-control">
                                                  <option value="">Pilih... </option>
                                                  <option value="L" {{ $item->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                                  <option value="P" {{ $item->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan </option>
                                                </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                                                <input type="date" name="tanggal_lahir" id="tanggallahir" class="form-control"  value="{{ date('Y-m-d', strtotime($item->tanggal_lahir)) }}"/>
                                                </div>

                                                

                                                <div class="col-md-12">
                                                <p>Pendidikan Terakhir </p>
                                                  <select name="pendidikan_terakhir" class="form-control">
                                                    <option value="">Pilih...</option>
                                                    <option value="SD" {{ $item->pendidikan == 'SD' ? 'selected' : '' }}>SD</option>
                                                    <option value="SMP" {{ $item->pendidikan == 'SMP' ? 'selected' : '' }}>SMP</option>
                                                    <option value="SMA" {{ $item->pendidikan == 'SMA' ? 'selected' : '' }}>SMA/SMK</option>
                                                    <option value="Sarjana"{{ $item->pendidikan == 'Sarjana' ? 'selected' : '' }}>Diploma/Sarjana</option>
                                                    <option value="Lainnya" {{ $item->pendidikan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                  <label class="form-label" for="kecamatan">Kecamatan</label>
                                                  <select name="kecamatan" id="kecamatan" class="form-control">
                                                  <option value="">Silahkan Pilih Kecamatan anda</option>
                                                  @foreach ($kecamatan as $data)
                                                      <option value="{{$data->id_kecamatan}}" {{ $item->id_kecamatan == $data->id_kecamatan ? 'selected' : '' }}>{{$data->nama_kecamatan}}</option>
                                                  @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="desa_kelurahan">Desa/Kelurahan</label>
                                                <select name="kelurahan" id="kelurahan" class="form-control">
                                                  <option value="">Silahkan Pilih kelurahan anda</option>
                                                  @foreach ($kelurahan as $data)
                                                      <option value="{{$data->id_kelurahan}}" {{ $item->id_kelurahan == $data->id_kelurahan ? 'selected' : '' }}>{{$data->nama_kelurahan}}</option>
                                                  @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="alamat">Alamat </label>
                                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{$item->alamat}}" />
                                                </div>
                                                <div class="col-md-12">
                                                <p>Jenis PPKS </p>
                                                  <select name="jenis_disabilitas" id="jenis_disabilitas" class="form-control">
                                                    <option>Pilih...</option>
                                                    @foreach ($jenis as $data)
                                                    <option value="{{$data->jenis_ppks_id}}" {{ $item->jenis_ppks_id == $data->jenis_ppks_id ? 'selected' : '' }}>{{$data->nama_jenis}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Keterangan Kedisabilitasan </p>
                                                  <select name="ket_disabilitas" id="ket_disabilitas" class="form-control" disabled>
                                                    <option>Pilih...</option>
                                                    @foreach ($detail as $data)
                                                    <option value="{{$data->id_detail_ppks}}" {{ $item->id_detail_ppks == $data->id_detail_ppks ? 'selected' : '' }}>{{$data->nama_detail_jenis}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Jaminan Kesehatan </p>
                                                  <select name="jamkes" class="form-control">
                                                    <option value="">Pilih...</option>
                                                    <option value="Kartu Indonesia Sehat" {{ $item->jaminan_kesehatan == 'Kartu Indonesia Sehat' ? 'selected' : '' }}>Kartu Indonesia Sehat</option>
                                                    <option value="Jaminan Kesehatan Lainnya" {{ $item->jaminan_kesehatan == 'Jaminan Kesehatan Lainnyat' ? 'selected' : '' }}>Jaminan Kesehatan Lainnya</option>
                                                    <option value="">Tidak Memiliki Jaminan Kesehatan</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Pekerjaan </p>
                                                  <select name="pekerjaan" class="form-control">
                                                    <option value="">Pilih...</option>
                                                    <option value="Belum/Tidak Bekerja" {{ $item->pekerjaan == 'Belum/Tidak Bekerja' ? 'selected' : '' }} >Belum/Tidak Bekerja</option>
                                                    <option value="Mengurus rumah tangga" {{ $item->pekerjaan == 'Mengurus rumah tangga' ? 'selected' : '' }}>Mengurus rumah tangga</option>
                                                    <option value="Pelajar/Mahasiswa" {{ $item->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}  >Pelajar/Mahasiswa</option>
                                                    <option value="Pensiunan" {{ $item->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                    <option value="Pedagang" {{ $item->pekerjaan == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                    <option value="Petani/pekebun" {{ $item->pekerjaan == 'Petani/pekebun' ? 'selected' : '' }}>Petani/pekebun</option>
                                                    <option value="Peternak" {{ $item->pekerjaan == 'Peternak' ? 'selected' : '' }} >Peternak</option>
                                                    <option value="Nelayan/perikanan" {{ $item->pekerjaan == 'Nelayan/perikanan' ? 'selected' : '' }}>Nelayan/perikanan</option>
                                                    <option value="Buruh" {{ $item->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                    <option value="Pembantu rumah tangga" {{ $item->pekerjaan == 'Pembantu rumah tangga' ? 'selected' : '' }}>Pembantu rumah tangga</option>
                                                    <option value="Tukang cukur, pijat,jahit,dll" {{ $item->pekerjaan == 'Tukang cukur, pijat,jahit,dll' ? 'selected' : '' }}>Tukang cukur, pijat,jahit,dll</option>
                                                    <option value="Wiraswasta" {{ $item->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                    <option value="Karyawan" {{ $item->pekerjaan == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                                                    <option value="Sopir/Tukang ojek"{{ $item->pekerjaan == 'Sopir/Tukang ojek' ? 'selected' : '' }}>Sopir/Tukang ojek</option>
                                                    <option value="Guru, Tenaga bantu non PNS" {{ $item->pekerjaan == 'Guru, Tenaga bantu non PNS' ? 'selected' : '' }}>Guru, Tenaga bantu non PNS</option>
                                                    <option value="PNS" {{ $item->pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
                                                    <option value="Seniman" {{ $item->pekerjaan == 'Seniman' ? 'selected' : '' }}>Seniman</option>
                                                    <option value="Lainnya" {{ $item->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label for="inputNama" class="form-label">Foto PPKS</label>
                                                <img src="{{asset('foto_upload/'. $item->foto_ppks)}}" width="150px" alt="FOTO PPKS" srcset="">
                                                <input type="file" class="form-control" name="foto_ppks" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto_ppks')}}">
                                                </div>

                                                <div class="col-md-12">
                                                  <label for="inputNama" class="form-label">Foto Luar</label>
                                                  <img src="{{asset('foto_upload/'. $item->foto_luar)}}" width="150px" alt="FOTO PPKS" srcset="">
                                                  <input type="file" class="form-control" name="foto_luar" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto_luar')}}">
                                                  </div>

                                                  <div class="col-md-12">
                                                    <label for="inputNama" class="form-label">Foto Dalam</label>
                                                    <img src="{{asset('foto_upload/'. $item->foto_dalam)}}" width="150px" alt="FOTO PPKS" srcset="">
                                                    <input type="file" class="form-control" name="foto_dalam" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto_dalam')}}">
                                                    </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="keterangan">Keterangan </label>
                                                <textarea name="keterangan" rows="5" class="form-control">{{$item->keterangann}}</textarea>
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
                                              
                                          </form>
                                      </div>
                                          <div class="modal-footer">
                                              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                              {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                          </div>
                                      </div>
                                  </div>
                                </div>


                                {{-- 
                                  DETAIL
                                  --}}
                                <div class="modal fade col-md-8" id="detailData{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="detailDataLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                      <div class="modal-header">
                                          <center><h4 class="modal-title" id="detailDataLabel">Detail Data PPKS</h4></center>
                                          <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          {{-- <form action="/{{ $item->id }}/acc_data" method="POST" enctype="multipart/form-data">
                                            @csrf
                                              
                                            <div class="card">
                                              <div class="card-body">
                                              <h5 class="card-title">Detail Data PPKS </h5>
                                                  @csrf
                                                <div class="col-md-12">
                                                  <label for="inputNama" class="form-label">Nama Lengkap</label>
                                                  <input type="text" name="nama" class="form-control" id="inputEmail5" value="{{$item->nama}}" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                  <label for="inputPassword5" class="form-label">NIK</label>
                                                  <input type="text" name="nik" class="form-control" id="inputPassword5" value="{{$item->nik}}" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                <p> Jenis Kelamin </p>
                                                <input type="text" name="nik" class="form-control" id="inputPassword5" value="{{$item->jenis_kelamin}}" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="tanggallahir">Tanggal Lahir</label>
                                                <input type="text" name="nik" class="form-control" id="inputPassword5" value="{{$item->tanggal_lahir}}" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Pendidikan Terakhir </p>
                                                <input type="text" name="nik" class="form-control" id="inputPassword5" value="{{$item->pendidikan}}" readonly>
                                                </div>
                                                <div class="col-md-12">
                                                  <label class="form-label" for="kecamatan">Kecamatan</label>
                                                  <select name="kecamatan" id="kecamatan" class="form-control" disabled>
                                                  <option value="">Silahkan Pilih Kecamatan anda</option>
                                                  @foreach ($kecamatan as $data)
                                                      <option value="{{$data->id_kecamatan}}" {{ $item->id_kecamatan == $data->id_kecamatan ? 'selected' : '' }} >{{$data->nama_kecamatan}}</option>
                                                  @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="desa_kelurahan">Desa/Kelurahan</label>
                                                <select name="kelurahan" id="kelurahan" class="form-control" disabled>
                                                  <option value="">Silahkan Pilih kelurahan anda</option>
                                                  @foreach ($kelurahan as $data)
                                                      <option value="{{$data->id_kelurahan}}" {{ $item->id_kelurahan == $data->id_kelurahan ? 'selected' : '' }}>{{$data->nama_kelurahan}}</option>
                                                  @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="alamat">Alamat </label>
                                                <input type="text" id="alamat" name="alamat" class="form-control" value="{{$item->alamat}}" readonly />
                                                </div>
                                                <div class="col-md-12">
                                                <p>Jenis PPKS </p>
                                                  <select name="jenis_disabilitas" id="jenis_disabilitas" class="form-control" disabled>
                                                    <option>Pilih...</option>
                                                    @foreach ($jenis as $data)
                                                    <option value="{{$data->jenis_ppks_id}}" {{ $item->jenis_ppks_id == $data->jenis_ppks_id ? 'selected' : '' }}>{{$data->nama_jenis}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Keterangan Kedisabilitasan </p>
                                                  <select name="ket_disabilitas" id="ket_disabilitas" class="form-control" disabled>
                                                    <option>Pilih...</option>
                                                    @foreach ($detail as $data)
                                                    <option value="{{$data->id_detail_ppks}}" {{ $item->id_detail_ppks == $data->id_detail_ppks ? 'selected' : '' }}>{{$data->nama_detail_jenis}}</option>
                                                    @endforeach
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Jaminan Kesehatan </p>
                                                  <select name="jamkes" class="form-control" disabled>
                                                    <option value="">Pilih...</option>
                                                    <option value="Kartu Indonesia Sehat" {{ $item->jaminan_kesehatan == 'Kartu Indonesia Sehat' ? 'selected' : '' }}>Kartu Indonesia Sehat</option>
                                                    <option value="Jaminan Kesehatan Lainnya" {{ $item->jaminan_kesehatan == 'Jaminan Kesehatan Lainnyat' ? 'selected' : '' }}>Jaminan Kesehatan Lainnya</option>
                                                    <option value="">Tidak Memiliki Jaminan Kesehatan</option>
                                                  </select>
                                                </div>
                                                <div class="col-md-12">
                                                <p>Pekerjaan </p>
                                                  <select name="pekerjaan" class="form-control" disabled>
                                                    <option value="">Pilih...</option>
                                                    <option value="Belum/Tidak Bekerja" {{ $item->pekerjaan == 'Belum/Tidak Bekerja' ? 'selected' : '' }} >Belum/Tidak Bekerja</option>
                                                    <option value="Mengurus rumah tangga" {{ $item->pekerjaan == 'Mengurus rumah tangga' ? 'selected' : '' }}>Mengurus rumah tangga</option>
                                                    <option value="Pelajar/Mahasiswa" {{ $item->pekerjaan == 'Pelajar/Mahasiswa' ? 'selected' : '' }}  >Pelajar/Mahasiswa</option>
                                                    <option value="Pensiunan" {{ $item->pekerjaan == 'Pensiunan' ? 'selected' : '' }}>Pensiunan</option>
                                                    <option value="Pedagang" {{ $item->pekerjaan == 'Pedagang' ? 'selected' : '' }}>Pedagang</option>
                                                    <option value="Petani/pekebun" {{ $item->pekerjaan == 'Petani/pekebun' ? 'selected' : '' }}>Petani/pekebun</option>
                                                    <option value="Peternak" {{ $item->pekerjaan == 'Peternak' ? 'selected' : '' }} >Peternak</option>
                                                    <option value="Nelayan/perikanan" {{ $item->pekerjaan == 'Nelayan/perikanan' ? 'selected' : '' }}>Nelayan/perikanan</option>
                                                    <option value="Buruh" {{ $item->pekerjaan == 'Buruh' ? 'selected' : '' }}>Buruh</option>
                                                    <option value="Pembantu rumah tangga" {{ $item->pekerjaan == 'Pembantu rumah tangga' ? 'selected' : '' }}>Pembantu rumah tangga</option>
                                                    <option value="Tukang cukur, pijat,jahit,dll" {{ $item->pekerjaan == 'Tukang cukur, pijat,jahit,dll' ? 'selected' : '' }}>Tukang cukur, pijat,jahit,dll</option>
                                                    <option value="Wiraswasta" {{ $item->pekerjaan == 'Wiraswasta' ? 'selected' : '' }}>Wiraswasta</option>
                                                    <option value="Karyawan" {{ $item->pekerjaan == 'Karyawan' ? 'selected' : '' }}>Karyawan</option>
                                                    <option value="Sopir/Tukang ojek"{{ $item->pekerjaan == 'Sopir/Tukang ojek' ? 'selected' : '' }}>Sopir/Tukang ojek</option>
                                                    <option value="Guru, Tenaga bantu non PNS" {{ $item->pekerjaan == 'Guru, Tenaga bantu non PNS' ? 'selected' : '' }}>Guru, Tenaga bantu non PNS</option>
                                                    <option value="PNS" {{ $item->pekerjaan == 'PNS' ? 'selected' : '' }}>PNS</option>
                                                    <option value="Seniman" {{ $item->pekerjaan == 'Seniman' ? 'selected' : '' }}>Seniman</option>
                                                    <option value="Lainnya" {{ $item->pekerjaan == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                                </div>
                                                <div class="col-md-12">
                                                <label for="inputNama" class="form-label">Foto PPKS</label>
                                                <img src="foto_upload/{{$item->foto_ppks}}" width="150px" alt="FOTO PPKS" srcset="">
                                                
                                                </div>

                                                <div class="col-md-12">
                                                  <label for="inputNama" class="form-label">Foto Luar</label>
                                                  <img src="foto_upload/{{$item->foto_luar}}" width="150px" alt="FOTO PPKS" srcset="">
                                                  
                                                  </div>

                                                  <div class="col-md-12">
                                                    <label for="inputNama" class="form-label">Foto Dalam</label>
                                                    <img src="foto_upload/{{$item->foto_dalam}}" width="150px" alt="FOTO PPKS" srcset="">
                                                  
                                                    </div>
                                                <div class="col-md-12">
                                                <label class="form-label" for="keterangan">Keterangan </label>
                                                <textarea name="keterangan" rows="5" class="form-control">{{$item->keterangann}}</textarea>
                                                </div>
                                                <div class="text-center">
                                                  @if (auth()->user()->level=="TPSK")
                                                  @else
                                                  <button type="submit" class="btn btn-primary">ACC</button>
                                                  @endif
                                                  
                                                </div>
                                              </form> --}}

                                              <form action="/{{ $item->id }}/acc_data" method="POST">
                                                @csrf
                                                <div class="row mb-3">
                                                  <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto PPKS</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <div class="d-flex justify-content-around">
                                                      <img src="{{asset('foto_upload/'. $item->foto_ppks)}}" alt="Profile" width="150px" style="margin-left: 10px;">
                                                      <img src="{{asset('foto_upload/'. $item->foto_luar)}}" alt="Profile" width="150px" style="margin-left: 10px;">
                                                      <img src="{{asset('foto_upload/'. $item->foto_dalam)}}" alt="Profile" width="150px" style="margin-left: 10px;">
                                                    </div>
                                                    
                                                  </div>
                                                </div>

                                                <input type="text" name="id" value="{{$item->id}}" hidden>
                            
                                                <div class="row mb-3">
                                                  <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="fullName" type="text" class="form-control" id="fullName" readonly value="{{$item->nama}}">
                                                  </div>
                                                </div>
                            
                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->nik}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Jenis Kelamin</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->jenis_kelamin}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Tanggal Lahir</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->tanggal_lahir}}">
                                                  </div>
                                                </div>
                            
                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Pendidikan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->pendidikan}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Kecamatan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->nama_kecamatan}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Kelurahan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->nama_kelurahan}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->alamat}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Jenis PPKS</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->nama_jenis}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Detail Disabilitas</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->nama_detail_jenis}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Jaminan Kesehatan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->jaminan_kesehatan}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Pekerjaan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->pekerjaan}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Keterangan</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->keterangann}}">
                                                  </div>
                                                </div>

                                                <div class="row mb-3">
                                                  <label for="nik" class="col-md-4 col-lg-3 col-form-label">Status</label>
                                                  <div class="col-md-8 col-lg-9">
                                                    <input name="nik" type="text" class="form-control" id="nik" readonly value="{{$item->status}}">
                                                  </div>
                                                </div>
                                                <div class="text-center">
                                                  @if (auth()->user()->level=="TPSK")
                                                  @else
                                                  @if ($item->status == "ACC")
                                                  @else
                                                  <button type="submit" class="btn btn-primary">ACC</button>
                                                  @endif
                                                  @endif
                                                  
                                                </div>
                                              </form>
                                          </div>
                                        </div>
                                              
                                          </form>
                                      </div>
                                          <div class="modal-footer">
                                          </div>
                                      </div>


                                  </div>
                                </div>

                            @endforeach
                          
                        </tbody>
                      </table>

    
                  </div>
                </div>
                <!-- End Recent Sales -->
              </div>
            </div>
            <!-- End Left side columns -->
          
        </section>
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


              if ($(this).val() == 4 || $(this).val() == 6) {
                  $('#ket_disabilitas').prop('disabled', false);
              } else {
                  $('#ket_disabilitas').prop('disabled', true);
              }
        });

        

      </script>          
    @endsection