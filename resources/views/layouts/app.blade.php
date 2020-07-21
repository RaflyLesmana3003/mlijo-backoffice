<!-- =========================================================
* Argon Dashboard PRO v1.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-pro
* Copyright 2019 Creative Tim (https://www.creative-tim.com)

* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{csrf_token()}}" />
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="google-signin-scope" content="profile email">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>

    <meta name="author" content="Creative Tim">
    <title>Mlijo.id - @yield('title')</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/icon.png') }}" type="image/png">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
    <!-- Page plugins -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/dist/css/select2.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('assets/vendor/quill/dist/quill.core.css') }}"> -->
    <!-- Argon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.1.0') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/loadingio/ldbutton@v1.0.1/dist/ldbtn.min.css" />
    <style>
        .show-read-more .more-text {
            display: none;
        }
    </style>
</head>

<body>

    <!-- Sidenav -->

    <nav class="sidenav navbar navbar-vertical fixed-left navbar-expand-xs navbar-light bg-white" id="sidenav-main">
        <div class="scrollbar-inner">
            <!-- Brand -->
            <div class="sidenav-header d-flex align-items-center">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{ asset('assets/img/favicon.png') }}" class="navbar-brand-img" alt="...">
                </a>
                <div class="ml-auto">
                    <!-- Sidenav toggler -->
                    <div class="sidenav-toggler d-none d-xl-block " data-action="sidenav-unpin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line "></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->

                    <ul class="navbar-nav">
                        @if (null !== Auth::user())
                        @if (Auth::user()->level == 1)
                        @if (Auth::user()->status == 0)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-home text-info"></i>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-home text-info"></i>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-home" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                                <i class="fa fa-home text-success"></i>
                                <span class="nav-link-text">produk</span>
                            </a>
                            <div class="collapse" id="navbar-home">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('produk') }}" class="nav-link">Daftar produk</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('106a6c241b8797f52e1e77317b96a201/kreator') }}" class="nav-link">Tambah produk</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="{{ url('list/konten') }}" class="nav-link">daftar konten</a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-home text-info"></i>
                                <span class="nav-link-text">transaksi</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-home text-info"></i>
                                <span class="nav-link-text">pengaturan</span>
                            </a>
                        </li>
                        @endif
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-home text-info"></i>
                                <span class="nav-link-text">Beranda</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-mlijo" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                                <i class="fa fa-users text-warning"></i>
                                <span class="nav-link-text">Mlijo</span>
                            </a>
                            <div class="collapse" id="navbar-mlijo">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('mlijo') }}" class="nav-link">Data Mlijo</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('106a6c241b8797f52e1e77317b96a201/kreator') }}" class="nav-link">Tambah Mlijo</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="{{ url('list/konten') }}" class="nav-link">daftar konten</a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('penarikandana') }}">
                                <i class="fa fa-dollar text-success"></i>
                                <span class="nav-link-text">penarikan dana</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-user text-yellow"></i>
                                <span class="nav-link-text">Data customer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#navbar-admin" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-maps">
                                <i class="fa fa-user-secret text-pink"></i>
                                <span class="nav-link-text">Admin</span>
                            </a>
                            <div class="collapse" id="navbar-admin">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ url('106a6c241b8797f52e1e77317b96a201') }}" class="nav-link">Data Admin</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ url('106a6c241b8797f52e1e77317b96a201/kreator') }}" class="nav-link">Tambah Admin</a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a href="{{ url('list/konten') }}" class="nav-link">daftar konten</a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>
                        @endif
                        @else
                        @if (Route::has('login'))
                        @auth
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('106a6c241b8797f52e1e77317b96a201') }}">
                                <i class="fa fa-money text-success"></i>
                                <span class="nav-link-text">beranda</span>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">
                                <i class="fa fa-sign-in text-success"></i>
                                <span class="nav-link-text">login</span>
                            </a>
                        </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">
                                <i class="fa fa-user-plus text-success"></i>
                                <span class="nav-link-text">register</span>
                            </a>
                        </li>
                        @endif
                        @endauth
                        @endif
                        @endif



                        <!-- </ul>
                    <hr class="my-3">
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">

                                <span class="nav-link-text text-muted">tips</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">

                                <span class="nav-link-text text-muted">tentang kami</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" target="_blank">

                                <span class="nav-link-text text-muted">bantuan</span>
                            </a>
                        </li>

                    </ul> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <div class="main-content  " id="panel">

        <!-- Topnav -->
        <nav class="navbar navbar-top navbar-expand navbar-dark bg-bgg border-bottom">
            <div class="container-fluid">
                @if (null == Auth::user())
                <div class="row d-none d-lg-block mr-3">
                    <div class="col-6 ">
                        <a href="{{ url('/') }}">
                            <!-- <img src="{{ asset('assets/img/favicon.png') }}" class="avatar avatar-sm"> -->
                        </a>
                    </div>
                    <div class="col-6 ">
                    </div>
                </div>

                @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Search form -->
                    <form action="/da5e6997913d68b2b6a59381a94e664a" method="post" enctype="multipart/form-data" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        {{ csrf_field() }}
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="key" id="key" placeholder="pencarian" type="text" required>
                            </div>
                        </div>
                        <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </form>
                    <!-- Navbar links -->
                    <ul class="navbar-nav align-items-center ml-md-auto text-dark">
                        <li class="nav-item d-xl-none">
                            <!-- Sidenav toggler -->
                            <div class="pr-3 sidenav-toggler" data-action="sidenav-pin" data-target="#sidenav-main">
                                <div class="sidenav-toggler-inner ">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </div>
                        </li>

                    </ul>


                    @if (null == Auth::user())
                    <div class="row  d-sm-block d-lg-none  ">
                        <div class="col-6 collapse-brand">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset('assets/img/favicon.png') }}" class="avatar avatar-sm">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse" aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                    @endif

                    <ul class="navbar-nav align-items-center ml-auto ml-md-0" style="float:right;">
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
                                <i class="fa fa-search text-dark"></i>
                            </a>
                        </li>@if (null !== Auth::user())
                        @if(Auth::user()->level == 0)

                        <!-- <li class="nav-item d-none d-lg-block text-dark">
                            <a class="nav-link text-dark" href="{{url('/8f8fe8570a6fca0299bce1c90079cbe6/1')}}">
                                <button class="btn btn-success">gabung jadi kreator</button>

                            </a>
                        </li> -->
                        @endif
                        @endif

                        @if (null !== Auth::user())

                        <li class="nav-item dropdown ">
                            <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="media align-items-center">


                                    <!-- <span class="avatar avatar-sm rounded-circle"> -->
                                    @if(Auth::user()->photo != "")
                                    <img alt="Image placeholder" src="{{ url('storage/file/pp/'.Auth::user()->photo) }}" class="avatar avatar-sm rounded-circle">

                                    @else
                                    <img alt="Image placeholder" src="{{ asset('assets/img/theme/team-1.png') }} " class="avatar avatar-sm rounded-circle">

                                    @endif
                                    <!-- </span> -->

                                    <div class="media-body ml-2 d-none d-lg-block text-dark">
                                        <span class="mb-0 text-sm  font-weight-bold"> {{ Auth::user()->name }}</span>
                                    </div>

                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                @if(Auth::user()->level == 0)
                                @endif
                                <a href="#!" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run "></i>
                                    <span>Logout</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @else


                        <ul class="navbar-nav align-items-lg-center ml-lg-auto">


                        </ul>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')

        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center text-lg-left text-muted">
                        &copy; 2019 <a href="https://www.buataja.id" class="font-weight-bold ml-1 text-success" target="_blank">Mlijo.id</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Mlijo.id</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">tentang kami</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js') }}"></script>
    <script src="{{ asset('assets/vendor/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/nouislider/distribute/nouislider.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <!-- <script src="{{ asset('assets/vendor/dropzone/dist/min/dropzone.min.js') }}"></script> -->

    <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables.net-select/js/dataTables.select.min.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
    <!-- Argon JS -->
    <script src="{{ asset('assets/js/argon.js?v=1.1.0') }}"></script>
    <!-- Demo JS - remove this in your project -->
    <script src="{{ asset('assets/js/demo.min.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>


</body>

</html>