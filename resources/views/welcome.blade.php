<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>BKSDM MATENG</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap Icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
    <!-- SimpleLightbox plugin CSS-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->

    <!-- Custom fonts for this template-->
    <link href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link href="{{asset('landing/css/styles.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-rHyoN1Wi5z5Fv5c51GG5u5F5n5z5u5F5w5W5B5n5t5C5u5F5u5F5u5F5u5F5u5F5u5F5u5F5u5F5u5F5u5F5u5F5w==" crossorigin="anonymous">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand" href="#page-top">
                <img src="{{asset('logo.png')}}" alt="BKPSDM Icon" class="navbar-icon" width="150" height="60">
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto my-lg-0">
                    <li class="nav-item" style="margin-right: 10px;">
                        <img src="{{asset('4.png')}}" alt="BKPSDM Icon" class="navbar-icon" width="150" height="60">
                    </li>
                    <li class="nav-item">
                        <img src="{{asset('5.png')}}" alt="BKPSDM Icon" class="navbar-icon" width="150" height="60">
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <header class="masthead"> <!-- Ubah tinggi header sesuai kebutuhan -->
        <div class="container px-4 px-lg-5 h-100">
            <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-8 align-self-end">
                    <h3 class="text-white font-weight-bold">Selamat Datang <br> Di Sistem Informasi Laporan Pengaduan Masyarakat Mamuju Tengah!</h3>
                    <hr class="divider" />
                </div>
                <div class="col-lg-8 align-self-baseline">
                    <p class="text-white-75 mb-3">(Laporan Mas)</p>
                    @if (Route::has('login'))
                    @auth
                    <a class="btn btn-primary btn-xl" href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                    <a class="btn btn-primary btn-xl" href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Masuk!</a>
                    <!-- @if (Route::has('register'))
                <a class="btn btn-primary btn-xl" href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif -->
                    @endauth
                    @endif
                </div>
                <div class="row justify-content-center">
                    <h3 class="text-white font-weight-bold">Langkah - Langkah Pengaduan</h3>
<br>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{asset('tulis.png')}}" style="max-height: 60px;" class="mb-3 img-fluid">
                                <h3 class="h4">Tulis Pengaduan</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{asset('verfikasi.png')}}" style="max-height: 60px;" class="mb-3 img-fluid">
                                <h3 class="h4">Verifikasi</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{asset('tindak.png')}}" style="max-height: 60px;" class="mb-3 img-fluid">
                                <h3 class="h4">Tindak Lanjut</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <img src="{{asset('selesai.png')}}" style="max-height: 60px;" class="mb-3 img-fluid">
                                <h3 class="h4">Selesai</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- FOOTER -->
    <footer id="main-footer" class="text-white bg-primary">
        <div class="container">
            <div class="row">
                <div class="col-md-3 text-center text-md-left">
                    <a href="{{ url('/') }}">
                        <img src="{{asset('logo.png')}}" style="max-height: 60px;" class="mb-3 img-fluid">
                    </a>
                </div>
                <div class="col-md-3 text-center d-none d-md-inline">
                    <h5>Information</h5>
                    <a href="https://bkpsdm.mamujutengahkab.go.id/" class="text-white">BKPSDM MAMUJU TENGAH</a>
                </div>
                <div class="col-md-3 text-center">
                    <h5>Our Services</h5>
                    <ul class="list-unstyled">
                        @guest
                        @if (Route::has('register'))
                        <li>
                            <a class="text-white" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                        @endif
                        @endguest
                        <li>
                            <a class="text-white" href="{{ route('LoginAdmin') }}">
                                admin
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 text-center text-md-left">
                    <h5>Hubungi Kami</h5>
                    <!-- <div class="text-nowrap"><i class="fas fa-envelope fa-fw mr-3"></i> contoh</div> -->
                    <div class="text-nowrap"><i class="fas fa-phone fa-fw mr-3"></i> (021) 123456</div>
                    <!-- <div class="text-nowrap"><i class="fas fa-globe fa-fw mr-3"></i> www.contoh.ac.id</div> -->
                </div>
            </div>
            <div class="text-center">
                <small>&copy; BKPSDM | MAMUJU TENGAH {{date("Y")}}</small>
            </div>
        </div>
    </footer>
    <!-- FOOTER -->

    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SimpleLightbox plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.js"></script>
    <!-- Core theme JS-->

    <script src="{{asset('landing/js/scripts.js')}}"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>