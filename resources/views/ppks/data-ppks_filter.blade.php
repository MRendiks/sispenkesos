<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISPENKESOS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo_sleman.png" alt="">
        <span class="d-none d-lg-block">SispenKesos2</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class=" nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/illustrations/man-with-laptop-light.png" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{auth()->user()->nama}}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{auth()->user()->nama}}</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="/dashboard">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li> <!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed link-active" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-team-line"></i></i><span>PPKS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/data-ppks">
              <i class="bi bi-circle"></i><span>Data PPKS</span>
            </a>
          </li>
          <li>
            <a href="/data-disabilitas">
              <i class="bi bi-circle"></i><span>Penyandang Disabilitas</span>
            </a>
          </li>
          <li>
            <a href="/data-kedisabilitas">
              <i class="bi bi-circle"></i><span>Anak Dengan Kedisabilitasan</span>
            </a>
          </li>
        </ul>
      </li><!-- End PPKS Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-road-map-line"></i><span>Jenis PPKS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          
          @foreach ($jenis as $item)
            <li>
              <a href="/filter_jenis/{{$item->jenis_ppks_id}}">
                <i class="bi bi-circle"></i><span>{{$item->nama_jenis}}</span>
              </a>
            </li>
          @endforeach
          

        </ul>
      </li><!-- End Kecamatan Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="/forminput">
        <i class="bi bi-journal-text"></i>
          <span>Form Input</span>
        </a>
      </li><!-- End Form Input Nav -->
    </ul>

  </aside>
  <!-- End Sidebar-->

        <div id="layoutSidenav_content">
             <main>
                <div class="container-fluid px-4">
    <div id="main" class="main">
        <h1 class="mt-4"><div class="sb-nav-link-icon">
                            <span class="material-symbols-outlined">
                                Data  
                                </span>
                                 PPKS</h1>
                                
                            <div class="card mb-4">
                                <div class="card-header">
                                    <i class="fas fa-table me-1"></i>
                                    Table PPKS
                                </div>
    
        <!-- End Page Title -->
        <section class="section dashboard">
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
                        @foreach ($kecamatan as $item)
                          <li><a class="dropdown-item" href="/filter/{{$item->id_kecamatan}}">{{$item->nama_kecamatan}}</a></li>
                        @endforeach
                        

                      </ul>
                    </div>
    
                    <div class="card-body">
                      <div class="d-flex justify-content-between">
                        <h5 class="card-title">Data PPKS </h5>
                        <a href="/cetak_laporan" class="btn btn-sm btn-success mt-3" style="width: 150px; height: 40px;">Cetak Laporan</a>
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
                            <th>Jaminan Kesehatan </th>
                            <th>Pekerjaan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ppks as $item)
                                <tr>
                                    <td> {{$item->id}} </td>
                                    <td> {{$item->nama}} </td>
                                    <td> {{$item->nik}} </td>
                                    <td> {{$item->jenis_kelamin}} </td>
                                    <td> {{$item->tanggal_lahir}} </td>
                                    <td> {{$item->pendidikan}} </td>
                                    <td> {{$item->nama_kecamatan}} </td>
                                    <td> {{$item->nama_jenis}} </td>
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
                                                <img src="foto_upload/{{$item->foto_ppks}}" width="150px" alt="FOTO PPKS" srcset="">
                                                <input type="file" class="form-control" name="foto_ppks" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto_ppks')}}">
                                                </div>

                                                <div class="col-md-12">
                                                  <label for="inputNama" class="form-label">Foto Luar</label>
                                                  <img src="foto_upload/{{$item->foto_luar}}" width="150px" alt="FOTO PPKS" srcset="">
                                                  <input type="file" class="form-control" name="foto_luar" id="foto" accept="image/png, image/gif, image/jpeg" value="{{old('foto_luar')}}">
                                                  </div>

                                                  <div class="col-md-12">
                                                    <label for="inputNama" class="form-label">Foto Dalam</label>
                                                    <img src="foto_upload/{{$item->foto_dalam}}" width="150px" alt="FOTO PPKS" srcset="">
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
                                          <form action="/{{ $item->id }}/acc_data" method="POST" enctype="multipart/form-data">
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

                            @endforeach
                          
                        </tbody>
                      </table>
    
                    </div>
    
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

            $('#jenis_disabilitas').ready(function() {
              if ($(this).val() == 4 || $(this).val() == 6) {
                  $('#ket_disabilitas').prop('disabled', false);
              } else {
                  $('#ket_disabilitas').prop('disabled', true);
              }
          });
        });

        // window.onload = function() {
        // $('#jenis_disabilitas').ready(function() {
        //       if ($(this).val() == 4 || $(this).val() == 6) {
        //           $('#ket_disabilitas').prop('disabled', false);
        //       } else {
        //           $('#ket_disabilitas').prop('disabled', true);
        //       }
        //   });
        // };
      </script>          
</div> 
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
<div class="copyright">
&copy; Copyright <strong><span>SISPENKESOS</span></strong>. All Rights Reserved
</div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/chart.js/chart.min.js"></script>
<script src="assets/vendor/echarts/echarts.min.js"></script>
<script src="assets/vendor/quill/quill.min.js"></script>
<script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
<script src="assets/vendor/tinymce/tinymce.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
@if(session('success'))
<div class="alert alert-success">
<script>
Swal.fire({
icon: 'success',
title: 'Success!',
text: "{{ session('success') }}",
});
</script>
</div>
@endif
@if(session('failed'))
<div class="alert alert-error">
<script>
Swal.fire({
icon: 'error',
title: 'Failed!',
text: "{{ session('failed') }}",
});
</script>
</div>
@endif
</body>

</html>