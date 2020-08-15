@extends('layouts.app')

@section('title','Daftar Produk')

@section('content')

<div class="header bg-success pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Produk</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb ">
                            <li class="breadcrumb-item "><a href="#" class="text-success">Home</a></li>
                            <li class="breadcrumb-item"><a href="#" class="text-success">Mlijo</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Produk</li>
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
            <div class="card-header row">
                <!-- Title -->
                <h5 class="h3 mb-0 col-md-6 col-sm-12">Produk</h5>
                <div class="col-md-6 col-sm-12">
                    @if(Auth::User()->level == "1")
                    <button type="button" class="btn btn-secondary btn-outline-info float-right" data-toggle="modal" data-target="#TambahModal"><i class="fa fa-plus"></i> Produk</button>
                    @endif
                </div>
            </div>
            <!-- Card body -->
            <div class="card-body">
                <div class="table-responsive py-4">
                    <table class="table table-flush datatable table-hover">
                        <thead class="thead-light">
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                @if( Auth::user()->level!='1' && Auth::user()->level!='2' ) <th>Mlijo </th> @endif
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Gambar</th>
                                @if( Auth::user()->level!='1' && Auth::user()->level!='2' ) <th>Mlijo </th> @endif
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @if(isset($produk))
                            @foreach($produk as $produk)
                            <tr>
                                <td>{{$produk->name}}</td>
                                <td>@if (empty($produk->img)) - @else <img width="100px" alt="Gambar {{$produk->name}}" src="{{url('file/' .$produk->img)}}"> @endif
                                </td>
                                @if( Auth::user()->level!='1' && Auth::user()->level!='2' ) <td>{{$produk->nama_mlijo}}</td> @endif
                                <td>{{$produk->category_product}}</td>
                                <td>{{$produk->price}}</td>
                                <td>{{$produk->stock}}</td>
                                <td>
                                    <button type="button" data-id="{{$produk->id}}" data-target="#EditModal" data-toggle="modal" class="btn btn-sm btn-warning btn-edit" alt="Edit"><i class="fa fa-pencil"></i></button>
                                    <button type="button" onclick="HapusProdak('{{$produk->id}}')" class="btn btn-sm btn-danger" alt="Hapus"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal " id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="addProduk">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Nama</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="text" required name="name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Harga</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="number" min='0' name="price" required class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Stok</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="number" min='0' name="stock" required class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Kategori</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <select class="form-control form-control-sm select2 custom-select" name="categori_product">
                                    <option value="">Pilih Kategori</option>
                                    @if(!empty($kategori))
                                    @foreach($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                    @endforeach
                                    @endif
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Gambar</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="file" accept="image/*" onchange="ChangeImg(this)" class="form-control file-change">
                                <input type="hidden" name="img_base_64">
                            </div>
                            <div class="preview col-6" style="margin-top: 10px;">
                            </div>
                            <div class="buttons-img col-6 d-none">
                                <button type="button" style="margin-top: 10px;" class="btn btn-danger btn-sm" onclick="DeleteImg(this)">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal " id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body before-loading">
                    <center>
                        <i class="fa fa-refresh fa-spin" style="font-size: 40px; margin-top:15px"></i>
                    </center>
                </div>
                <form id="editProduk" class="after-loading d-none">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Nama</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="hidden" required name="id" class="form-control form-control-sm">
                                <input type="text" required name="name" class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Harga</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="number" min='0' name="price" required class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Stok</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="number" min='0' name="stock" required class="form-control form-control-sm">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Kategori</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <select class="form-control form-control-sm select2 custom-select" name="categori_product">
                                    <option value="">Pilih Kategori</option>
                                    @if(!empty($kategori))
                                    @foreach($kategori as $item)
                                    <option value="{{$item->id}}">{{$item->kategori}}</option>
                                    @endforeach
                                    @endif
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-2 col-md-4 col-sm-6">Gambar</label>
                            <div class="col-lg-10 col-md-8 col-sm-6">
                                <input type="file" accept="image/*" onchange="ChangeImg(this)" class="form-control file-change">
                                <input type="hidden" name="img_base_64">
                                <input type="text" class="d-none" name="img">
                            </div>
                            <div class="preview col-6" style="margin-top: 10px;">
                            </div>
                            <div class="buttons-img col-6 d-none">
                                <button type="button" style="margin-top: 10px;" class="btn btn-danger btn-sm" onclick="DeleteImg(this)">Hapus</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
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

        let FileChange = document.querySelectorAll(".file-change");

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

        function DeleteImg(selector) {
            selector = $(selector);
            selector.parent().parent().find(".file-change").val("");
            selector.parent().parent().find("[type=hidden]").val("");
            selector.parent().parent().find(".preview").html("");
            selector.parent().addClass("hiddem d-none");
        }
    </script>

    @endsection

    @section('footer')
    <script>
        $("#TambahModal").on("shown.bs.modal", function() {
            $(this).find("input,select").val("").trigger("change")
            $(this).find(".preview").html("")
            $(this).find(".buttons-img").addClass("hiddem d-none");
        })

        $("#EditModal").on("shown.bs.modal", function() {
            $(this).find("input,select").val("").trigger("change")
            $(this).find(".after-loading").addClass("d-none")
            $(this).find(".before-loading").removeClass("d-none")
        })

        $(".btn-edit").click(function() {
            let params = "id=" + $(this).data("id")
            ajaxData("/produk_detail", params, function(resp) {
                if (resp.error || empty(resp.data)) {
                    alert(resp.message)
                    $("#EditModal").modal("hide");
                } else {
                    $.each(resp.data[0], function(index, item) {
                        $("#EditModal").find("[name=" + index + "]").val(item).trigger("change")
                    });
                    if (!empty(resp.data[0].img)) {
                        $("#EditModal").find(".preview").html("<img src='{{url('file/')}}/" + resp.data[0].img + "' width='200px'>")
                    }
                    $("#EditModal").find(".before-loading").addClass("d-none")
                    $("#EditModal").find(".after-loading").removeClass("d-none")
                }
            }, function(data) {
                console.log(data)
            })
        })

        $("#addProduk").submit(function(e) {
            e.preventDefault();
            let params = $("#addProduk").serialize()
            ajaxData("/produk_add", params, function(resp) {
                if (resp.error) {
                    alert(resp.message)
                } else {
                    location.reload();
                }
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        });

        $("#editProduk").submit(function(e) {
            e.preventDefault();
            let params = $("#editProduk").serialize()
            ajaxData("/produk_edit", params, function(resp) {
                if (resp.error) {
                    alert(resp.message)
                } else {
                    location.reload();
                }
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        });

        function HapusProdak(id) {
            let hapus = confirm("Anda Yakin Akan Menghapus Produk ini ?")
            if (!hapus) return 0;

            let params = 'id=' + id
            ajaxData("/produk_delete", params, function(resp) {
                if (resp.error) {
                    alert(resp.message)
                } else {
                    location.reload();
                }
            }, function(data) {
                alert("Ops.. Something wrong !!");
            })
        }
    </script>

    @endsection