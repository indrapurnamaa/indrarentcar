<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Kaha Visual - Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <div class="app-brand-text demo text-dark fw-bolder ">
                    Indra RentCar
                </div>
              </div>
              <!-- /Logo -->
              @if ($errors->any())
              @foreach ($errors->all() as $err)
              <p class="alert alert-danger">{{ $err }}</p>
              @endforeach
              @endif
              <form method="POST" action="{{ route('proses.register') }}">
                @csrf
                <div class="mb-3">
                  <label class="form-label">Username</label>
                  <input type="text" placeholder="Username" id="username" class="form-control form-control-lg" name="username" required>
                  @if ($errors->has('username'))
                  <span class="text-danger">{{ $errors->first('username') }}</span>
                  @endif
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" placeholder="Password" id="password" class="form-control form-control-lg" name="password" required>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" placeholder="Nama Lengkap" id="nama" class="form-control form-control-lg" name="nama" required>
                    @if ($errors->has('nama'))
                    <span class="text-danger">{{ $errors->first('nama') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" placeholder="Alamat" id="alamat" class="form-control form-control-lg" name="alamat" required>
                    @if ($errors->has('alamat'))
                    <span class="text-danger">{{ $errors->first('alamat') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label">No. Telepon</label>
                    <input type="text" placeholder="No.Telepon" id="no_telepon" class="form-control form-control-lg" name="no_telepon" required>
                    @if ($errors->has('no_telepon'))
                    <span class="text-danger">{{ $errors->first('no_telepon') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <label class="form-label">No. SIM</label>
                    <input type="text" placeholder="No.SIM" id="no_sim" class="form-control form-control-lg" name="no_sim" required>
                    @if ($errors->has('no_sim'))
                    <span class="text-danger">{{ $errors->first('no_sim') }}</span>
                    @endif
                  </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Register</button>
                </div>
                <p class="text-center">
                  <span>Sudah daftar?</span>
                  <a href="{{route('login')}}">
                    <span>Silahkan Login</span>
                  </a>
                </p>
              </form>
            </div>
        </div>
    </div>


    <!-- / Content -->
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
