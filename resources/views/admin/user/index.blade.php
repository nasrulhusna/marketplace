@extends('admin.layout.master')
	<!-- header -->
	@section('header')
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('static/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style type="text/css">
    .table-list{
      list-style: none;
      padding: 3px;
      margin-left: -30px;
    }
  </style>
		
	@endsection
  
	<!-- body -->
	@section('body')
  <div class="callout callout-info">
        <h4>User</h4>
  </div>
  <div class="row">
    <!-- awal halaman tambah kategori -->
    <!-- end tambah kategori -->
    <!-- halaman awal tampil kategori -->
    <div class="col-md-12">
      <!-- koding untuk lihat data sebelah kanan -->
      <div class="box box-primary">
          
            <!-- /.box-header -->
            <div class="box-body">
              <a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Tambah user</a>
              <br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th width="20px">No</th>
                  <th>Photo</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Alamat</th>
                  <th>Gender</th>
                  <th>Status</th>
                  <th>Role</th>
                  <th width="15%">Aksi</th>
                </tr>
                </thead>
                <tbody>

                 @php
                 $no = 1;
                 @endphp
                 @foreach($user as $user)
                 <tr>
                   <td>{{ $no++ }}</td>
                   <td><img src="{{ url($user->photo)}}" width="50px" alt="{{ $user->name}}"></td>
                   <td>{{ $user->name}}</td>
                   <td>{{ $user->username}}</td>
                   <td>{{ $user->email}}</td>
                   <td>{{ $user->address }}</td>
                   <td>{{ $user->gender}}</td>
                   <td>
                     @if($user->status == '0')
                     <a href="{{ url('admin/user/status/'.$user->id) }}" class="text-danger">Non Aktif</a>
                     @else
                     <a href="{{ url('admin/user/status/'.$user->id) }}" class="text-primary">Aktif</a>
                     @endif
                   </td>
                   <td>{{ $user->role }}</td>
                   <td>
                     <a href="{{ url('admin/user/edit/'.$user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                      <a href="{{ url('admin/user/delete/'.$user->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i>Hapus</a>
                   </td>
                 </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </div>

  </div>
		
	@endsection

	<!-- footer -->
	@section('footer')
		<!-- DataTables -->
<script src="{{ asset('static/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('static/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
	@endsection
@show