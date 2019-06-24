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
        <h4>Kategori</h4>
  </div>
  <div class="row">
    <!-- awal halaman tambah kategori -->
    <!-- end tambah kategori -->
    <!-- halaman awal tampil kategori -->
    <div class="col-md-12">
      <!-- koding untuk lihat data sebelah kanan -->
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Photo</th>
                  <th>Product</th>
                  <th>Stock</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @php
                    $no = 1;
                    @endphp

                  @foreach($product as $item)
                      <td>{{$no ++ }}</td>
                      <td><img src="{{ url($item->photo) }}" width="50px"></td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->stock }}</td>
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