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
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-primary card-outline">
              <div class="card-body">
                <h5 class="card-title mb-3">Selamat Datang!</h5>
                <p class="card-text">
                  Website ini merupakan portal data advokat peradi. Anda dapat melakukan penelusuran data advokat untuk kepentingan validasi data advokat yang kamu ketahui.
                </p>
                <p class="card-text">
                  Data advokat yang dapat kamu telusuri adalah 
                  <ul>
                    <li>Nama</li>
                    <li>NIA</li>
                    <li>Nomor Handphone</li>
                    <li>Alamat</li>
                  </ul>
                </p>
                <p class="card-text">
                  Untuk informasi lebih lanjut silahkan hubungi kami.
                </p>
              </div>
            </div><!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Pencarian Data</h5>
              </div>
              <div class="card-body">
                <h6 class="card-title">By Nama</h6>

                <p class="card-text">Anda dapat mencari data advokat melalui fitur "search" pada menu dikanan atas.</p>

                <h6 class="card-title">By Wilayah</h6>

                <p class="card-text">Anda dapat mencari data advokat melalui fitur "alamat" pada menu dikanan atas.</p>
                <a href="{{ route('index') }}" class="btn btn-primary">Telusuri Advokat</a>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection