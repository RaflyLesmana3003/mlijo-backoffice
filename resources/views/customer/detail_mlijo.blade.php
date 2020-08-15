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
                                <span>-Mlijo Detail</span>
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
                    <section class="contact spad">
                        <div class="container">
                            <div class="row">
                                <div class=" col-md-4 col-sm-6 text-center">
                                    <div class="contact__widget">
                                        <span class="fa fa-map-marker"></span>
                                        <h4>Mlijos</h4>
                                        <p>{{$mlijo[0]->nama}}</p>
                                    </div>
                                </div>
                                <div class=" col-md-4 col-sm-6 text-center">
                                    <div class="contact__widget">
                                        <span class="fa fa-phone"></span>
                                        <h4>Phone</h4>
                                        <p>{{$mlijo[0]->phone_number}}</p>
                                    </div>
                                </div>
                                <div class=" col-md-4 col-sm-6 text-center">
                                    <div class="contact__widget">
                                        <span class="fa fa-envelope"></span>
                                        <h4>Email</h4>
                                        <p>{{empty($mlijo[0]->email)?'-' : $mlijo[0]->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="map">
                        <div id='mapid' style="height: 100%;"></div>
                    </section>
                    <section class="related-product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title related__product__title">
                                        <h2>Related Product</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                @foreach($lain as $produk )

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
                    <hr class="softn clr" />
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

<script>
    // SetMap('{{$mlijo[0]->lat}}', '{{$mlijo[0]->long}}');
    // let lat = "{{$mlijo[0]->lat}}";
    // if (!empty(lat))

    SetMap('{{$mlijo[0]->lat}}', '{{$mlijo[0]->long}}');

    function SetMap(lat, long) {
        if (empty(lat) || empty(long)) {
            return getLocationNow()
        }
        let position = {
            coords: {
                lat: lat,
                long: long
            }
        }
        return getPosition(position);

    }

    function getLocationNow() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(getPosition);
        } else {
            let position = {
                coords: {
                    lat: 51.505,
                    long: -0.09
                }
            }
            getPosition(position);
        }
    }

    function getPosition(position) {
        let P = position.coords;

        if (empty(P.long) || empty(P.lat)) {
            P.lat = P.latitude
            P.long = P.longitude
        }

        var map = L.map('mapid', {
            // Set latitude and longitude of the map center (required)
            center: [P.lat, P.long],
            // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
            zoom: 15
        });
        L.control.scale().addTo(map);
        // Create a Tile Layer and add it to the map 
        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        var searchControl = new L.esri.Controls.Geosearch().addTo(map);

        var results = new L.LayerGroup().addTo(map);

        // searchControl.on('results', function(data) {
        //     console.log(data)
        //     results.clearLayers();
        //     for (var i = data.results.length - 1; i >= 0; i--) {
        //         results.addLayer(L.marker(data.results[i].latlng));
        //         setLangLit(data.results[i].latlng)
        //     }
        // });



        // map.on('click', function(e) {
        //     results.clearLayers();
        //     setLangLit(e.latlng)
        //     results.addLayer(L.marker(e.latlng, {
        //         title: "{{$mlijo[0]->nama}}"
        //     }).addTo(map))
        // });

        results.addLayer(L.marker([P.lat, P.long], {
            title: "{{$mlijo[0]->nama}}"
        }).addTo(map))

        setLangLit(P)
        setTimeout(function() {
            $('.pointer').fadeOut('slow');
        }, 3400);
    }

    function setLangLit(data) {
        console.log(data)
        if (empty(data.lng) && !empty(data.long)) {
            data.lng = data.long
        }

        $("[name=lat]").val(data.lat).trigger("change")
        $("[name=long]").val(data.lng).trigger("change")
    }

    $("#editProduk").submit(function(e) {
        e.preventDefault();
        let params = $("#editProduk").serialize()
        ajaxData("/setting_edit", params, function(resp) {
            if (resp.error) {
                alert(resp.message)
            } else {
                location.reload();
            }
        }, function(data) {
            alert("Ops.. Something wrong !!");
        })
    });

    function ChangeImg(selector) {
        var selector = selector;
        if (!selector.files || !selector.files[0]) {
            return;
        }
        var tipefile = selector.files[0].type.toString();
        if (tipefile != "image/png" && tipefile != "image/jpeg" && tipefile != "image/bmp") {
            $(selector).val("");
            alert("Format salah, pilih file dengan format jpg/png/bmp");
            return;
        }
        if ((selector.files[0].size / 1024) > 2048) {
            $(selector).val("");
            alert("Maximum file size is 2 MB");
            return;
        }

        var FR = new FileReader();
        FR.addEventListener("load", function(readerEvent) {
            var image = new Image();
            image.onload = function(imageEvent) {
                var canvas = document.createElement("canvas"),
                    max_size = 300, // TODO : pull max size from a site config
                    width = image.width,
                    height = image.height;

                if (width > height) {
                    if (width > max_size) {
                        height *= max_size / width;
                        width = max_size;
                    }
                } else {
                    if (height > max_size) {
                        width *= max_size / height;
                        height = max_size;
                    }
                }
                canvas.width = width;
                canvas.height = height;
                canvas.getContext("2d").drawImage(image, 0, 0, width, height);

                var base64 = canvas.toDataURL("image/jpeg");
                image_base64 = base64;
                $(selector).parent().parent().find(".preview").html("<img src='" + image_base64 + "' width='200px'>")

                $(selector).parent().parent().find(".buttons-img").removeClass("hidden d-none")

                base64 = base64.replace(/^data:image\/(png|jpg|jpeg|bmp);base64,/, '');
                with_photo = true;
                $(selector).parent().find("[type=hidden]").val(base64);
            };
            image.src = readerEvent.target.result;
        });
        FR.readAsDataURL(selector.files[0]);
    };
</script>
@stop

@endsection