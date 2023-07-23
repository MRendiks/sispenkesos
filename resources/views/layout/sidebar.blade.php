<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>SISPENKESOS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">
  

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.min.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard')}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo_sleman.png')}}" alt="">
        <span class="d-none d-lg-block">SispenKesos</span>
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
            <img src="{{asset('assets/img/illustrations/man-with-laptop-light.png')}}" alt="Profile" class="rounded-circle">
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

      </li><!-- End Kecamatan Nav --> 

      <li class="nav-item">
        <a class="nav-link collapsed link-active" data-bs-target="#jenis-nav" data-bs-toggle="collapse" href="#">
        <i class="ri-team-line"></i></i><span>Jenis PPKS</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="jenis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          @foreach ($jenis as $item)
          <li>
            @if ($item->jenis_ppks_id == 6)
            <a href="/data-disabilitas">
              <i class="bi bi-circle"></i><span>{{$item->nama_jenis}}</span>
            </a>
            @endif
            @if ($item->jenis_ppks_id == 4)
            <a href="/data-kedisabilitas">
              <i class="bi bi-circle"></i><span>{{$item->nama_jenis}}</span>
            </a>
            @endif
            @if($item->jenis_ppks_id != 6 && $item->jenis_ppks_id != 4)
            <a href="{{route('filter_jenis_2', ['id' => $item->jenis_ppks_id])}}">
              <i class="bi bi-circle"></i><span>{{$item->nama_jenis}}</span>
            </a>
            @endif
            
          </li>
          @endforeach
          
          
        </ul>
      </li>

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
                        @yield('container')
                    </div> 
                </main>
                
  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="margin: 60px;">
    <div class="copyright">
      &copy; Copyright <strong><span>SISPENKESOS</span></strong>. All Rights Reserved
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.12/dist/sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> --}}
  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>
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





            