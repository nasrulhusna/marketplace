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
    <div class="col-md-12">
      <!-- untuk input data kategori sebelah kiri -->
      <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('category.update',$category->id) }}" method="POST">
              @csrf
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="" required name="name" placeholder="Nama Kategori" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" class="form-control" required id="" name="slug" value="{{ $category->slug }}" placeholder="Slug">
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Icon</label>
                  <input type="text" class="form-control" value="{{ $category->icon }}" id="" name="icon" placeholder="Icon Font Awesome">
                  <!-- <a href="https://fontawesome.com/v4.7.0/icons/">example icon</a> -->
                </div>
                <div class="form-group">
                  @if($category->parent_id ==null)
                  <input type="hidden" name="parent_id" value="">

                  @else
                  <label for="">Parent Kategori</label>
                    <select class="form-control" name="parent_id">
                     @foreach($categorys as $cas)
                     <option value="{{$cas->id}}"
                        @if($cas->id == $category->parent_id)
                        selected="selected"
                        @endif
                        >{{ $cas->name }}</option>
                     @endforeach
                    </select>
                    @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
    </div>  
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