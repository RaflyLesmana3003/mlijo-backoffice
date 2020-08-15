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
    <link rel="stylesheet" href="{{ asset('assets/customer/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.5.6/plyr.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/gh/loadingio/ldbutton@v1.0.1/dist/ldbtn.min.css" />
    @yield('css')
    <style>
        .show-read-more .more-text {
            display: none;
        }

        .chard {
            color: white;
            text-decoration: none;
            padding: 15px 26px;
            position: relative;
            display: inline-block;
            border-radius: 2px;
        }

        .chard:hover {
            color: aqua;
        }

        .chard .badge {
            position: absolute;
            top: 5px;
            right: 1px;
            /* padding: 5px 10px; */
            border-radius: 50%;
            background: red;
            color: white;
        }

        .footer-v {
            width: 100%;
        }

        .featured__item {
            border: 1px solid lightgrey;
            border-radius: 20px;
        }

        .featured__item:hover {
            border: 1px solid aqua;
            box-shadow: 0px 0px 20px 5px lightgrey;
        }

        .featured__item__pic {
            border-radius: 20px 20px 0px 0px;

        }

        .bg-custom {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(<?= url('banner/banner.jpg') ?>);
            /* background: rgb(2, 0, 36); */
            /* background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 35%, rgba(0, 212, 255, 1) 100%); */
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 1;
            /* -webkit-filter: blur(5px);
            -moz-filter: blur(5px);
            -o-filter: blur(5px);
            -ms-filter: blur(5px);
            filter: blur(5px); */
        }
    </style>
</head>

<body>

    <!-- Sidenav -->


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
                    <form action="{{url('customers')}}" method="get" enctype="multipart/form-data" class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                        <!-- {{ csrf_field() }} -->
                        <div class="form-group mb-0">
                            <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" name="key" id="key" placeholder="pencarian" value="{{empty($_GET['key'])?'':$_GET['key']}}" type="text">
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
                        </li>
                        <li class="nav-item">
                            <a class="nav-link chard" href="#">
                                <i class="fa fa-shopping-cart text-dark"></i>
                                <span class="badge">{{ (empty((Session::pull('data')))?"": 1 )    }}</span>
                            </a>
                        </li>

                        @if (null !== Auth::user())
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
        <footer class="footer  pt-0">
            <div class="row footer-v align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center text-lg-left text-muted " style="margin-left: 10px;">
                        &copy; 2019 <a href="https://www.buataja.id" class="font-weight-bold  text-success" target="_blank">Mlijo.id</a>
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

    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  bg-success" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title text-white" style="font-weight: bold;" id="exampleModalLabel">Silahkan Login Dahulu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <!-- Title -->
                            <h5 class="h3 mb-0 collapse RegisterData">Gabung jadi Custommer</h5>
                            <h5 class="h3 mb-0 collapse show LoginData">Login Custommer</h5>
                        </div>
                    </div>
                    <div class=" collapse  RegisterData">
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <span class="message-alert"></span>
                                <form id="formtab" class="form">

                                    <label class="form-control-label" for="nama">nama<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="nama" placeholder="contoh: aldo riswanto" required>
                                    <br>

                                    <label class="form-control-label" for="HP">No HP<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="hp" placeholder="contoh: 083115510748" required>
                                    <br>

                                    <label class="form-control-label" for="alamat">Alamat<span style="color:red;">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="alamat" placeholder="contoh: Jl. Raya XXX" required>
                                    <br>

                                    <label class="form-control-label" for="password">password<span style="color:red;">*</span></label>
                                    <input type="password" class="form-control form-control-sm" name="password" required>
                                </form>

                            </div>
                        </div>
                        <div class="align-center">

                            <button class="btn btn-success" form="formtab" type="submit">Daftar jadi mlijo</button>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".collapse" aria-expanded="false" aria-controls=".LoginData .RegisterData">Sign in</button>
                        </div>
                    </div>

                    <div class="collapse show LoginData  ">
                        <form id="formLogin">
                            @csrf
                            <span class="message-alert"></span>
                            <div class="form-group row">
                                <label for="email" class="col-md-12 col-form-label">{{ __('No HP ') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control form-control-sm @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Login') }}
                                    </button>
                                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".collapse" aria-expanded="false" aria-controls=".LoginData .RegisterData" aria-expanded="false">Daftar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Argon Scripts -->
    <!-- Core -->
    <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
    <!-- Optional JS -->
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
    <script src="{{ asset('assets/customer/shop.js') }}"></script>
    <script>
        $(".select2").select2()

        function ajaxData(url, params, success, error, method) {
            method = (empty(method) ? 'POST' : method)



            $.ajax({
                type: method,
                url: '{{url("/")}}' + url,
                data: params + "&_token=" + $('meta[name="csrf-token"]').attr('content'),
                dataType: "JSON",
                success: function(response) {
                    success(response)
                },
                error: function(Status) {
                    console.log(Status)
                    error(error)
                }
            });
        }

        function empty(data) {
            return (data == [] || data == '' || data == undefined)
        }



        $("img").each(function(index, element) {
            let selector = $(this)
            $(this).on('error', function() {
                selector.attr("src", "{{asset('assets/customer/imgerror.png')}}")
            })
        });
    </script>

    @yield("script")

    <script>
        $("#AddCard").submit(function(e) {
            e.preventDefault();
            let params = $("#AddCard").serialize()
            ajaxData("/addChart", params, function(resp) {
                if (resp.error) {
                    if (resp.message == 'Login') {
                        $("#loginModal").modal("show");
                    } else {
                        alert(resp.message)
                    }
                } else {
                    alert("Barang Berhasil Ditambahkan");
                }
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        });

        $(".chard").click(function() {
            let user = "{{ (!Auth::user())? '' : Auth::user()->id }}";
            if (empty(user)) {
                $("#loginModal").modal("show");
            } else {
                window.location = "{{url('chard')}}";
            }
        })

        $("#formtab").submit(function(e) {
            e.preventDefault();
            let params = $("#formtab").serialize()
            ajaxData("/daftar_customer", params, function(data) {
                if (data.error) {
                    AlertData('danger', data.message)
                } else {
                    AlertData('success', data.output)
                    $("#formtab input").val("").trigger("change")
                }
                console.log(data)
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        });


        $("#formLogin").submit(function(e) {
            e.preventDefault();
            let params = $("#formLogin").serialize()
            ajaxData("/login_customer", params, function(data) {
                if (data.error) {
                    AlertData('danger', data.message)
                } else {
                    location.reload()
                }
                console.log(data)
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        });

        function AlertData(tipe, message) {
            message = (message == undefined ? 'Cek koneksi anda' : message);
            $(".message-alert").append('<div  class="aa alert alert-' + tipe + ' alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>' + message + '</strong></div>');
            setTimeout("$('.aa').fadeOut(1000);", 3000);
            $("html, body").animate({
                scrollTop: 0
            }, "slow");
        }

        var proQty = $('.pro-qty');
        proQty.prepend('<span class="dec qtybtn">-</span>');
        proQty.append('<span class="inc qtybtn">+</span>');
        proQty.on('click', '.qtybtn', function() {
            var $button = $(this);
            var oldValue = $button.parent().find('input').val();
            if ($button.hasClass('inc')) {
                var newVal = parseFloat(oldValue) + 1;
            } else {
                // Don't allow decrementing below zero
                if (oldValue > 0) {
                    var newVal = parseFloat(oldValue) - 1;
                } else {
                    newVal = 0;
                }
            }
            $button.parent().find('input').val(newVal);
        });
    </script>
</body>

</html>