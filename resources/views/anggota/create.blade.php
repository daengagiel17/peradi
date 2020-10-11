@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Anggota</a></li>
              <li class="breadcrumb-item active">Tambah</li>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Anggota</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('anggota.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama anggota" required>
                  </div>
                  <div class="form-group">
                    <label for="nia">Nomor Induk Anggota</label>
                    <input type="text" class="form-control" id="nia" name="nia" placeholder="Masukkan nomor induk anggota" required>
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Masukkan nomor handphone" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat_kantor">Alamat</label>
                    <textarea name="alamat_kantor" id="alamat_kantor" class="form-control" rows="3" placeholder="Masukkan alamat kantor" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="kecamatan_id">Kecamatan</label>
                    <select name="kecamatan_id" id="kecamatan_id" class="form-control">
                      <option value="">Pilih Kecamatan</option>
                      @foreach ($kecamatans as $kecamatan)
                        <option value="{{$kecamatan->id}}">{{$kecamatan->nama}}</option>                          
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="photo" name="photo">
                        <label class="custom-file-label" for="photo">Choose file</label>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{route('anggota.index')}}" class="btn btn-danger">Kembali</a>
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