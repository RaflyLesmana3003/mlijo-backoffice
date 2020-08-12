@extends('layouts.customer')

@section('title','Beranda')

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="display-2 text-white d-inline-block mb-0">List Produk!🚀</h6>
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
        @foreach($product as $produk )

        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="thumbnail">
                        <a href="product_details.html" class="overlay"></a>
                        <a class="zoomTool" href="{{url('customers_detail?id='.$produk->id)}}" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
                        <a href="{{url('customers_detail?id='.$produk->id)}}"><img src="{{url('file/'.$produk->img)}}" style="max-height: 200px;" alt=""></a>
                        <div class="caption cntr">
                            <p>{{$produk->name}}</p>
                            <p><strong> {{formatRp($produk->price)}}</strong></p>
                            <h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
                            <br class="clr">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection