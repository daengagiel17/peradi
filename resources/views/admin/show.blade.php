@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item active">Detail Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-4 offset-md-4">
            <!-- Widget: user widget style 2 -->
            <div class="card card-widget widget-user-2">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info">
                <div class="widget-user-image">
                  <img class="img-circle elevation-2" src="{{ asset($admin->photo) }}" alt="Admin Avatar">
                </div>
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username">{{$admin->name}}</h3>
                <h5 class="widget-user-desc">Admin</h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <label class="nav-link">
                      Email <span class="float-right badge">{{$admin->email}}</span>
                    </label>
                  </li>
                  <li class="nav-item">
                    <label class="nav-link">
                      Nomor Handphone <span class="float-right badge">+62{{substr($admin->nomor_hp,2)}}</span>
                    </label>
                  </li>
                  <li class="nav-item">
                    <label class="nav-link">
                      Role <span class="float-right badge">{{$admin->roles->implode('name', ', ')}}</span>
                    </label>
                  </li>
                </ul>
              </div>
              <div class="card-footer">
                <div class="col-md-4 offset-md-4">
                    <a href="{{ route('admin.index') }}" class="btn btn-sm btn-danger btn-block">Kembali</a>
                </div>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection