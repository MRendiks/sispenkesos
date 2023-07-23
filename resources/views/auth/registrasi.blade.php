
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$title}}</title>
    {{-- <link rel="icon" href="../../../images/logo.png"> --}}
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="new_assets/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template-->
    <link href="new_assets/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="assets/assets2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">


</head>
<body>

  <style>
    form{
            animation: transitionIn-Y-bottom 0.5s;
        }
    body {
      /* background-image: url('../images/bg.jpg'); */
      background-size: cover;
      background-repeat: no-repeat;
    }
  </style>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-1">{{$title}} SISPENKESOS</h1>
                    <img src="assets/img/logo_sleman.png" class="mt-2 mb-4" width="100">
                  </div>

                  <form class="user" method="POST" action="{{route('postregis')}}">
                    @csrf
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan nama..." name="nama" autofocus required value="{{ old('nama') }}">
                      @error('nama')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <select class="form-control" style="border-radius: 50px; font-size: 13px;" name="level" id="level">
                        <option value="">Silahkan Pilih Level</option>
                        <option value="operator">operator</option>
                        <option value="TKSK">TKSK</option>
                        <option value="TPSK">TPSK</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email" placeholder="Masukan Email..." name="email" autofocus required value="{{ old('email') }}">
                      @error('email')
                      <div class="invalid-feedback">
                          {{ $message }}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user @error('nohp') is-invalid @enderror" id="nohp" name="nohp" placeholder="Masukan Nomor HP..."
                      autofocus required value="{{ old('nohp') }}">
                          @error('email')
                              <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" id="password" name="password" placeholder="Masukan Password..."
                      autofocus required value="{{ old('password') }}">
                          @error('email')
                              <div class="invalid-feedback">
                              {{ $message }}
                          </div>
                      @enderror
                    </div>
                    <button type="submit" name="login" class="btn btn-success btn-user btn-block">
                      Registrasi
                    </button>
                  
                  <hr>
                    
                    </form>
                    <br>
                  <div class="copyright text-center my-auto">
                    <span>Copyright &copy;SISPENKESOS <?= date('Y'); ?> </span>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

</html>