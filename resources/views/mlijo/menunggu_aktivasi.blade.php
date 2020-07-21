@extends('layouts.app')

@section('title','Beranda')

@section('content')

<div class="header bg-success pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="display-2 text-white d-inline-block mb-0">Maaf Akun anda masih belum aktif</h6>
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
  <div class="row justify-content-center">
    <div class="card col-10">
      <!-- Card header -->
      <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">Maaf Akun anda masih belum aktif</h5>
      </div>
      <!-- Card body -->
      <div class="card-body">
        <!-- List group -->
        <ul class="list-group list-group-flush list my--3">
          <div class="row justify-item-center mx-1">
            <div class="col-12">
              <img class="thumbnail img-fluid rounded" width="100px" src="{{ asset('assets/img/empty6.png') }}" alt="">

            </div>
            <div class="col-12 text-center">
              <p class="text-muted"><span class="h3 text-muted">kreator tidak ditemukan nih</p>

            </div>
          </div>
        </ul>
      </div>
    </div>
  </div>



  @endsection