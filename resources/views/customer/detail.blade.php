@extends('layouts.customer')

@section('title','Beranda')

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="display-2 text-white d-inline-block mb-0">Detail Produk!🚀</h6>
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
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">

                    <div class="well well-small row col-8">
                        <div class="col-md-4 col-sm-6">
                            <div id="myCarousel" class="carousel slide cntr">
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <a href="#">
                                            <img src="{{url('file/'.$produk->img)}}" alt="" style="max-width:400px; max-height:500px" />
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-6">
                            <h3>{{$produk->name}}</h3>
                            <hr class="soft" />

                            <form class="form-horizontal qtyFrm" id="addCard">
                                <div class="form-group row">
                                    <label class="col-sm-4 col-form-label" valign='middle'>Rp.{{formatRp($produk->price)}}</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="{{$produk->id}}" name="id">
                                        <input type="hidden" value="{{$produk->id_mlijo}}" name="id_mlijo">
                                        <input type="number" name="qty" min='1' max='{{$produk->stock}}' class="form-control form-control-sm" placeholder="qty">
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label"><span>{{$produk->category_product}}</span></label>
                                </div>
                                <div class="control-group">
                                    Penjual : <a class="btn btn-link" href="{{url('customers_mlijo/'.$produk->id)}}">{{$produk->nama_mlijo}}</a>
                                </div>
                                <h4>{{$produk->stock}} items in stock</h4>
                                <p>
                                    <button type="submit" class="shopBtn">
                                        <span class="icon-shopping-cart"></span> Add to cart
                                    </button>
                                </p>
                            </form>
                        </div>
                    </div>
                    <hr class="softn clr" />
                    <h1>Produk Lainnya dari {{$produk->nama_mlijo}}</h1>

                    <div class="row ">

                        @foreach($lain as $produk )

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
            </div>
        </div>
    </div>
</div> @endsection