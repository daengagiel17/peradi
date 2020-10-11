@extends('layouts.simkat')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Peradi <small>Data Center</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Detail data advokat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              @if ($anggota->status == 'aktif')
                <div class="widget-user-header bg-success">                  
              @elseif($anggota->status == 'cuti')
                <div class="widget-user-header bg-warning">
              @elseif($anggota->status == 'tidak aktif')
                <div class="widget-user-header bg-danger">
              @endif
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="{{ asset($anggota->photo) }}" alt="User Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$anggota->nama}}</h3>
                <h5 class="widget-user-desc">{{Str::upper($anggota->status)}}</h5>
              </div>
              <div class="card-body">
                <h5 class="card-title mb-3">Nomor Induk Anggota :</h5>
                <p class="card-text">
                  {{Str::upper($anggota->nia)}}
                </p>
                <h5 class="card-title mb-3">Nomor Handphone :</h5>
                <p class="card-text">
                  {{$anggota->no_hp}}
                </p>
                <h5 class="card-title mb-3">Email :</h5>
                <p class="card-text">
                  {{$anggota->email??"Tidak ada"}}
                </p>
                <h5 class="card-title mb-3">Alamat :</h5>
                <p class="card-text">
                  {{$anggota->alamat_kantor}}
                </p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-md-4 offset-md-4">
                      <a href="{{ route('index') }}" class="btn btn-sm btn-danger btn-block">Kembali</a>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection