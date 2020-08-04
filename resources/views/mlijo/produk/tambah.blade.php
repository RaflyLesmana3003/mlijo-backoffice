@extends('layouts.app')

@section('title','Daftar Produk')

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tambah Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="#" class="text-success">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-success">Mlijo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Produk</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-lg-6 col-5 text-right">
                    <a href="#" class="btn btn-sm btn-neutral text-success">Eksport PDF</a>
                    <a href="#" class="btn btn-sm btn-neutral text-success">Eksport Excel</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6   ">
    <div class="row justify-content-center">
        <div class="card col-12">
            <!-- Card header -->
            <div class="card-header">
                <!-- Title -->
                <h5 class="h3 mb-0">Produk</h5>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect2">Example multiple select</label>
                        <select multiple class="form-control" id="exampleFormControlSelect2">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function aktif(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/aktifasiakun',
                data: {
                    id: id,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(data) {
                    $("#message").append('<div  class="aa alert alert-' + data.responseJSON.tipe + ' alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>' + data.responseJSON.data + '</strong></div>');
                    setTimeout("$('.aa').fadeOut(1000);", 3000);
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            });
        };

        function nonaktif(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'POST',
                url: '/nonaktifasiakun',
                data: {
                    id: id,
                },
                success: function(data) {
                    location.reload();

                },
                error: function(data) {
                    $("#message").append('<div  class="aa alert alert-' + data.responseJSON.tipe + ' alert-block"><button type="button" class="close" data-dismiss="alert">×</button> <strong>' + data.responseJSON.data + '</strong></div>');
                    setTimeout("$('.aa').fadeOut(1000);", 3000);
                    $("html, body").animate({
                        scrollTop: 0
                    }, "slow");
                }
            });
        };
    </script>

    @endsection