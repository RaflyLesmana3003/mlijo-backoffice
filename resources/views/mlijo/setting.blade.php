@extends('layouts.app')

@section('title','Daftar Produk')
@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin="" />
<!-- <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.css" /> -->
<link rel="stylesheet" type="text/css" href="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.css">

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Setting</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="#" class="text-success">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-success">Mlijo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Setting</li>
                        </ol>
                    </nav>
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
            <div class="card-header row">
                <!-- Title -->
                <h5 class="h3 mb-0 col-md-6 col-sm-12">Setting</h5>

            </div>
            <!-- Card body -->
            <div class="card-body">
                <form id="editProduk">
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Nama</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="text" required name="nama" value="{{$mlijo->nama}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Orang Tua</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="text" required name="parent" value="{{$mlijo->parent}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Anak</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="hidden" required name="id" value="{{$mlijo->id}}" class="form-control form-control-sm">
                            <input type="text" required name="child" value="{{$mlijo->child}}" class="form-control form-control-sm">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Bank</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <select class="form-control select2" name="bank_id">
                                <option value="">Pilih Bank</option>
                                @foreach($bank as $bank)
                                <option value="{{$bank->id}}" @if($bank->id ==$mlijo->bank_id)
                                    selected
                                    @endif
                                    >{{$bank->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">No Rekening</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="text" required name="no_rekening" value="{{$mlijo->no_rekening}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Atas Nama</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="text" required name="atasnama" value="{{$mlijo->atasnama}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">KTP</label>
                        <div class="col-lg-10 col-md-8 col-sm-6">
                            <input type="text" required name="ktp" value="{{$mlijo->ktp}}" class="form-control form-control-sm">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Foto KTP</label>
                        <div class="col-lg-6 col-md-4 col-sm-6">
                            <input type="file" accept="image/*" onchange="ChangeImg(this)" class="form-control file-change">
                            <input type="hidden" name="img_base_64">
                            <input type="text" class="d-none" name="foto_ktp" value="{{$mlijo->foto_ktp}}">
                        </div>
                        <div class="col-lg-6 col-md-4 col-sm-6 preview">
                            @if(!empty($mlijo->foto_ktp))
                            <img src="{{url('file/'.$mlijo->foto_ktp)}}">
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-2 col-md-4 col-sm-6">Lokasi</label>
                        <div class="col-lg-4 col-md-2 col-sm-6">

                            <input type="text" readonly class="form-control form-control-sm" name="lat" value="{{$mlijo->lat}}">
                            <input type="text" readonly class="form-control form-control-sm" name="long" value="{{$mlijo->long}}">
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div id="mapid" style="height: 200px;"></div>
                        </div>
                    </div>


                    <button type="submit" class="btn btn-success">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
<!-- <script src="http://cdn.leafletjs.com/leaflet-0.7.2/leaflet.js"></script> -->
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet/0.0.1-beta.5/esri-leaflet.js"></script>
<script src="https://cdn-geoweb.s3.amazonaws.com/esri-leaflet-geocoder/0.0.1-beta.5/esri-leaflet-geocoder.js"></script>

<script>
    SetMap('{{$mlijo->lat}}', '{{$mlijo->long}}');

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

        searchControl.on('results', function(data) {
            console.log(data)
            results.clearLayers();
            for (var i = data.results.length - 1; i >= 0; i--) {
                results.addLayer(L.marker(data.results[i].latlng));
                setLangLit(data.results[i].latlng)
            }
        });

        map.on('click', function(e) {
            results.clearLayers();
            setLangLit(e.latlng)
            results.addLayer(L.marker(e.latlng).addTo(map))
        });

        results.addLayer(L.marker([P.lat, P.long]).addTo(map))
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

@endsection