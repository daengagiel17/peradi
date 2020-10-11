@extends('layouts.simkat')

@section('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">    
@endsection

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
              <li class="breadcrumb-item active">{{$status}}</li>
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
        <div class="col-12">
          <div class="card">
            {{-- <div class="card-header">
              <h3 class="card-title">Hover Data Table</h3>
            </div> --}}
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-responsive table-bordered table-hover">
                <thead>
                <tr>
                  <th style="width:500px;">Nama</th>
                  <th style="width:200px;">NIA</th>
                  <th style="width:860px;">Alamat</th>
                  <th style="width:100px;">Status</th>
                  <th style="width:100px;">Detail</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($anggotas as $anggota)
                  <tr>
                    <td>{{$anggota->nama}}</td>
                    <td>{{$anggota->nia}}</td>
                    <td>{{$anggota->alamat_kantor}}</td>
                    <td>{{Str::upper($anggota->status)}}</td>
                    <td>
                      <a href="{{ route('show', ['id' => $anggota->id])}}" class="btn btn-sm btn-info"><span class="fa fa-bars"></span></a>
                    </td>
                  </tr>                    
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>NIA</th>
                  <th>Alamat</th>
                  <th>Detail</th>
                </tr>
                </tfoot>
              </table>
            </div>
          </div>
          <!-- /.card -->
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

@section('script')
<!-- DataTables -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": true,
    });
  });
</script>    
@endsection