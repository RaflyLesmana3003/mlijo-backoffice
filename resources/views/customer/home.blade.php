@extends('layouts.customer')

@section('title','Beranda')

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="display-2 text-white d-inline-block mb-0">pencarian!🚀</h6>
                </div>
            </div>
            <!-- Card stats -->
            <div class="row">
            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row ">
        <div class="col-md-4 col-sm-6">
            <div class="card" style="width: 18rem;">
                <img src="{{ asset('assets/img/theme/team-1.png') }}" class="card-img-top mx-auto d-block" style="max-width: 200px; max-height:200px ; margin-top:10px" alt="...">
                <div class="card-body">
                    b4media
                    <p class="card-text bold">Nama Barang</p>
                    <p class="card-text">Harga</p>
                    <a href="#" class="btn btn-sm btn-success">Tumbas</a>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="media">
                        <img class="mr-3 img-thumbnail" style="max-width: 200px; max-height:200px ; margin-top:10px" src="{{ asset('assets/img/theme/team-1.png') }} " alt="Generic placeholder image">
                        <div class="media-body">
                            <h5 class="mt-0">Media heading</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection