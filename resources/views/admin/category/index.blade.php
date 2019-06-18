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
    <div class="col-md-4">
      <!-- untuk input data kategori sebelah kiri -->
      <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Kategori</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ url('admin/category') }}" method="POST">
              @csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="" required name="name" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" class="form-control" required id="" name="slug" placeholder="Slug">
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Icon</label>
                  <input type="text" class="form-control" id="" name="icon" placeholder="Icon Font Awesome">
                  <!-- <a href="https://fontawesome.com/v4.7.0/icons/">example icon</a> -->
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Parent Kategori</label>
                  <select class="form-control" name="parent_id">
                    <option value="">Kosongkan</option>
                    @foreach($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                  </select>
                  <span class="text-danger"><p>Pilih kosongkan untuk membuat katagori utama</p></span>
                    
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
    </div>  
    <!-- end tambah kategori -->
    <!-- halaman awal tampil kategori -->
    <div class="col-md-8">
      <!-- koding untuk lihat data sebelah kanan -->
      <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">List Data Kategori</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th width="320px">Kategori</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $no = 1;
                  @endphp
                  @foreach($categorys as $category)
                  <tr>
                    <td width="40px">{{ $no++ }}</td>
                    <td>{{ $category->name }}
                    <ul>
                      @foreach($category->children as $subcategory)

                      <li class="table-list"> - {{ $subcategory->name}}  </li>
                      @endforeach
                    </ul>
                      <!-- <td>{{ $category->slug }}</td> -->
                    </td>
                    <!-- Koding untuk menu edit dan hapus
                     -->

                    <td>
                      <form action="{{route('category.destroy',$category->id)}}" method="post">

                      <a href="{{url('admin/category/'.$category->id.'/edit')}}" class="btn btn-warning btn-xs">Edit</a>
                      @csrf
                      {{method_field('DELETE')}}
                      <input type="submit" name="" value="Hapus" class="btn btn-danger btn-xs">
                    </form>
                   
                    <ul>
                      @foreach($category->children as $subcategory)
                      <form action="{{route('category.destroy',$subcategory->id)}}" method="post">

                      <li class="table-list" style="margin-left: -43px;"><a href="{{url('admin/category/'.$subcategory->id.'/edit')}}" class="btn btn-warning btn-xs">Edit</a>
                      @csrf
                      {{method_field('DELETE')}}
                      <input type="submit" name="" value="Hapus" class="btn btn-danger btn-xs">
                    </form>

                        </li>
                      @endforeach
                    </ul>
                      
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