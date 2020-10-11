@extends('layouts.admin')

@section('css')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
  <!-- Toastr -->
  <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">    
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">    
@endsection

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Beranda</a></li>
              <li class="breadcrumb-item active">Anggota</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Daftar Anggota</h3>
                <div class="card-tools">
                  <a href="{{ route('anggota.create') }}" class="btn btn-sm btn-success">Tambahkan</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive">
                <table id="data-anggota" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th style="width:20px">#</th>
                    <th>Nama Anggota</th>
                    <th style="width:200px">NIA</th>
                    <th style="width:200px">Nomor Handphone</th>
                    <th style="width:110px">Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php $nomor = 1; @endphp
                  @foreach ($anggotas as $key => $anggota)
                    <tr>
                      <td>{{$nomor++}}</td>
                      <td>{{$anggota->nama}}</td>
                      <td>{{$anggota->nia}}</td>
                      <td>{{$anggota->no_hp}}</td>
                      <td>
                        <a href="{{route('anggota.show', ['id' => $anggota->id])}}" class="btn btn-sm btn-info"><i class="fa fa-eye"></i></a>
                        <a href="{{route('anggota.edit', ['id' => $anggota->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                        <button class="btn btn-sm btn-danger delete-anggota" data-id="{{$anggota->id}}"><i class="fa fa-trash"></i></button>
                      </td>
                    </tr>                      
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

@section('script')
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script type="text/javascript" language="javascript">
  $(function (){
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#data-anggota").DataTable();

    $('body').on('click', '.delete-anggota', function() {
      var id = $(this).data("id");
      $confirm = confirm('Yakin menghapus anggota ini ?');

      if($confirm){
        $.ajax({
          type: "DELETE",
          url: '{{route("anggota.store")}}/'+id,
          dataType: 'JSON',
          success: function (data) {
            toastr.success('Berhasil menghapus');
            location.reload();
          },
          error: function (data) {
            toastr.error("Tidak berhasil menghapus")
          }
        });              
      }
    });
    
  });
</script>
@endsection