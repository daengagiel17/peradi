<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Home | Peradi</title>
  <!--====== Favicon Icon ======-->
  <link rel="shortcut icon" href="{{ asset('img/peradi1.png')}}" type="image/jpg">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Required Meta Tags Always Come First -->
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Simkat, Sistem Informasi Manajemen Advokat, Peradi, Advokat, Peradi Malang, Peradi RBA, Peradi RBA Malang, Hukum, Advokat Malang">
    <meta name="title" content="SIMKAT DPC PERADI MALANG">
    <meta name="description" content="Sistem Informasi Manajemen Advokat DPC Peradi Malang">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="profile">
    <meta property="og:url" content="https://simkat.dpcperadimalang.org/">
    <meta property="og:title" content="SIMKAT DPC PERADI MALANG">
    <meta property="og:description" content="Sistem Informasi Manajemen Advokat DPC Peradi Malang">
    <meta property="og:image" content="{{ asset('img/peradi1.png')}}">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://simkat.dpcperadimalang.org/">
    <meta property="twitter:title" content="SIMKAT DPC PERADI MALANG">
    <meta property="twitter:description" content="Sistem Informasi Manajemen Advokat DPC Peradi Malang">
    <meta property="twitter:image" content="{{ asset('img/peradi1.png')}}">

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  @yield('css')
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light navbar-white border-bottom">
    <div class="container">
      <a href="{{ route('home') }}" class="navbar-brand">
        <img src="{{ asset('img/peradi1.png') }}" alt="Peradi Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
      </a>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
      <!-- SEARCH FORM -->
      <form class="form-inline ml-3" action="{{ route('search.nama') }}" method="POST">
        @csrf
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" name="nama" placeholder="Masukkan nama" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-map"></i>
            <span class="badge badge-primary navbar-badge">5</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Pilih Kecamatan</span>
            @foreach ($kecamatans as $kecamatan)
            <div class="dropdown-divider"></div>
            {{-- <a href="#" class="dropdown-item">
              <i class="fa fa-location-arrow mr-2"></i> {{$kecamatan->nama}}
            </a>                 --}}
            <a class="dropdown-item" href="{{ route('search.kecamatan') }}"
                onclick="event.preventDefault();
                              document.getElementById('search-form-{{$kecamatan->id}}').submit();">
                <i class="fa fa-location-arrow mr-2"></i> {{$kecamatan->nama}}
            </a>
            <form id="search-form-{{$kecamatan->id}}" action="{{ route('search.kecamatan') }}" method="POST" style="display: none;">
                @csrf
                <input type="hidden" name="kecamatan_id" value="{{$kecamatan->id}}">
            </form>
            @endforeach

            <div class="dropdown-divider"></div>
            <a href="{{ route('index') }}" class="dropdown-item dropdown-footer">Lihat semua advokat</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  @yield('content')

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Copyright &copy; 2014-2018 <a href="https://adminlte.io">AdminLTE.io</a> | All rights reserved.
    </div>
    <!-- Default to the left -->
    <strong>Develop by <b><a href="http://irit-io.id">Irit.io</a></b>.</strong> Turning ideas into code.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

@yield('script')

</body>
</html>