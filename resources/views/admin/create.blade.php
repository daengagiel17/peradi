@extends('layouts.admin')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Admin</a></li>
              <li class="breadcrumb-item active">Tambah Admin</li>
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
                <h3 class="card-title">Form Buat Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('admin.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Nama Admin</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                    <label for="Email">Email Admin</label>
                    <input type="email" class="form-control" id="Email" name="email" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <label for="nomor_hp">Nomor Handphone Admin</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">+62</span>
                      </div>
                      <input type="tel" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="Enter Nomor Handphone">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="role_id">Jenis Admin</label>
                    <select name="role_id" id="role_id" class="form-control">
                      <option value="">Pilih jenis admin</option>
                      @foreach ($roles as $role)
                        <option value="{{$role->id}}">{{$role->name}}</option>                          
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="kabupaten_id">Kabupaten</label>
                    <select name="kabupaten_id" id="kabupaten_id" class="form-control text-capitalize">
                        <option value="">Pilih Kabupaten</option>
                    </select>
                  </div>                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{route('admin.index') }}" class="btn btn-danger">Kembali</a>
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

@section('script')
<script type="text/javascript" language="javascript">
  $(function (){
    // Pilih Kabupaten
    $('#role_id').on('change', function() {
      var role_id = $(this).val();

      console.log(role_id);
      if(role_id == 3)
      {
        $('#kabupaten_id').empty();       
        $('#kabupaten_id').append("<option value=''>Pilih Kabupaten</option>");  

        var kabupaten = {!! json_encode($kabupatens) !!};

        console.log(kabupaten);
        for (i = 0; i < kabupaten.length; i++)
        {
            // Set kabupaten option
            $('#kabupaten_id').append("<option value='" + kabupaten[i].id + "'>" + kabupaten[i].nama + "</option>");
        }
      }
      else
      {
        $('#kabupaten_id').empty();     
        $('#kabupaten_id').append("<option value=''>Pilih Kabupaten</option>");  
      }
    });      
  });
</script>
@endsection