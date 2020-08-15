@extends('layouts.customer')

@section('title','Beranda')

@section('content')

<div class="header bg-custom pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-12">
                    <center>
                        <div class="breadcrumb__text">
                            <h2>Mlijo.id</h2>
                            <div class="breadcrumb__option">
                                <a href="#">Home</a>
                                <span>Shop</span>
                            </div>
                        </div>
                    </center>
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
    <div class="card">
        <div class="card-body">
            <section class="featured spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>List Product</h2>
                            </div>
                            <!-- <div class="featured__controls">
                                <ul>
                                    <li class="active" data-filter="*">All</li>
                                    <li data-filter=".oranges">Oranges</li>
                                    <li data-filter=".fresh-meat">Fresh Meat</li>
                                    <li data-filter=".vegetables">Vegetables</li>
                                    <li data-filter=".fastfood">Fastfood</li>
                                </ul>
                            </div> -->
                        </div>
                    </div>
                    <div class="row featured__filter">
                        @foreach($product as $produk )
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" style=" background-image: url({{url('file/'.$produk->img)}})">
                                    <ul class="featured__item__pic__hover">
                                        <li><a href="{{url('customers_detail?id='.$produk->id)}}"><i class="fa fa-heart"></i></a></li>
                                        <li><a href="{{url('customers_detail?id='.$produk->id)}}"><i class="fa fa-retweet"></i></a></li>
                                        <li><a href="{{url('customers_detail?id='.$produk->id)}}"><i class="fa fa-shopping-cart"></i></a></li>
                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><a href="{{url('customers_detail?id='.$produk->id)}}">{{$produk->name}}</a></h6>
                                    <h5>${{formatRp($produk->price)}}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>

    @foreach($product as $produk )

    <!-- <div class="col-lg-3 col-md-4 col-sm-6">
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
        </div> -->
    @endforeach
</div>



@endsection