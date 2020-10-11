@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item active">Edit Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Edit Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.update', ['id' => $admin->id]) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{$admin->name}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email Admin</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{$admin->email}}">
                  </div>
                  <div class="form-group">
                    <label for="nomor_hp">Nomor Handphone Admin</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">+62</span>
                      </div>
                      <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Enter Number Handphone" value="{{substr($admin->nomor_hp,2)}}">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Role Admin</label>
                    @foreach ($roles as $role)
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="role[]" value="{{$role->id}}" id="role-{{$role->id}}" @if($admin->roles->contains('id', $role->id)) checked @endif>
                        <label class="form-check-label" for="role-{{$role->id}}">{{$role->name}}</label>
                      </div>                        
                    @endforeach
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Ubah</button>
                  <a href="{{ route('admin.index') }}" class="btn btn-danger">Batal</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection