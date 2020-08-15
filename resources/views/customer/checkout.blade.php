@extends('layouts.customer')

@section('title','Beranda')

@section('css')
@parent
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" /> -->
<link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">
@stop

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
                                <span>- Checkout</span>
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
    <div class="row ">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <section class="shoping-cart spad">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="shoping__cart__table">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="shoping__product">Products</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($produk as $item)
                                                <tr>
                                                    <td class="shoping__cart__item">
                                                        <img src="{{url('file/'.$item->img)}}" style="max-width: 100px; max-height:100px" alt="">
                                                        <h5>{{$item->name}}</h5>
                                                    </td>
                                                    <td class="shoping__cart__price">
                                                        ${{formatRp($item->price)}}
                                                    </td>
                                                    <td class="shoping__cart__quantity">
                                                        <div class="quantity">
                                                            <div class="pro-qty">
                                                                <input type="text" value="1">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="shoping__cart__total">
                                                        ${{formatRp($item->price)}}
                                                        <!-- harus e total -->
                                                    </td>
                                                    <td class="shoping__cart__item__close">
                                                        <span class="fa fa-eraser"></span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="shoping__cart__btns">
                                        <a href="#" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                            Upadate Cart</a>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="shoping__continue">
                                        <div class="shoping__discount">
                                            <h5>Discount Codes</h5>
                                            <form action="#">
                                                <input type="text" placeholder="Enter your coupon code">
                                                <button type="submit" class="site-btn">APPLY COUPON</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="shoping__checkout">
                                        <h5>Cart Total</h5>
                                        <ul>
                                            <li>Subtotal <span>$454.98</span></li>
                                            <li>Total <span>$454.98</span></li>
                                        </ul>
                                        <a href="#" class="primary-btn">PROCEED TO CHECKOUT</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
@parent
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<!-- <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script> -->
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

@stop

@endsection