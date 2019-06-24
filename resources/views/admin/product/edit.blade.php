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
        <h4>Produk</h4>
  </div>
  <div class="row">
    <!-- awal halaman tambah kategori -->
    <!-- end tambah kategori -->
    <!-- halaman awal tampil kategori -->
    <div class="col-md-10">
      <!-- koding untuk lihat data sebelah kanan -->
      <div class="box box-primary">
         <div class="box-header with-border">
              <h3 class="box-title">Edit Produk</h3>
          </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{method_field('PUT')}}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nama</label>
                  <input type="text" class="form-control" id="" required name="name" value="{{ $product->name }}" placeholder="Nama Kategori">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Slug</label>
                  <input type="text" class="form-control" required id="" value="{{ $product->slug }}" name="slug" placeholder="Slug">
                </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Deskripsi</label>
                  <textarea id="my-editor" name="description" class="form-control">{{ $product->description }}</textarea>
                  <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Stok</label>
                  <input type="number" class="form-control" required value="{{ $product->stock }}" name="stok" placeholder="Stok">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Harga</label>
                  <input type="number" class="form-control" required value="{{ $product->price}}"  name="price" placeholder="Harga">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Parent Kategori</label>
                  <select class="form-control" name="category_id">
                   
                    @foreach($categorys as $category)
                    <option 
                    @if ($category->id == $product->id)
                      selected = "selected"
                    @endif
                    value="{{ $category->id }}">{{ $category->name }}</option>
                      @foreach($category->children as $sub)

                      <option 
                      @if ($product->category_id == $sub->id)
                      selected = "selected"
                      @endif

                      value="{{ $sub->id}}"> - {{ $sub->name }}</option>
                      @endforeach 
                    @endforeach

                  </select>
                
                </div>
                 <div class="form-group">
                  <div class="row">
                  <div class="col-md-5">
                    <label for="exampleInputEmail1">Gambar</label>
                    <input type="file" class="form-control"  name="file" placeholder="Gambar">
                  </div>
                </div>
                   <div class="col-md-5">
                    <img src="{{ url($product->photo )}}" width="200px">
                    <input type="hidden" name="tmp_image" value="{{ $product->photo}}">
                  </div>
                  
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
<!-- for ckeditor -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script>
   var route_prefix = "{{ url(config('lfm.url_prefix', config('lfm.prefix'))) }}";
  </script>

  <!-- CKEditor init -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/ckeditor.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/ckeditor/4.5.11/adapters/jquery.js"></script>
  <script>
    $('textarea[name=description]').ckeditor({
      height: 300,
      filebrowserImageBrowseUrl: route_prefix + '?type=Images',
      filebrowserImageUploadUrl: route_prefix + '/upload?type=Images&_token={{csrf_token()}}',
      filebrowserBrowseUrl: route_prefix + '?type=Files',
      filebrowserUploadUrl: route_prefix + '/upload?type=Files&_token={{csrf_token()}}'
    });
  </script>

  <!-- TinyMCE init -->
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>
    var editor_config = {
      path_absolute : "",
      selector: "textarea[name=tm]",
      plugins: [
        "link image"
      ],
      relative_urls: false,
      height: 129,
      file_browser_callback : function(field_name, url, type, win) {
        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

        var cmsURL = editor_config.path_absolute + route_prefix + '?field_name=' + field_name;
        if (type == 'image') {
          cmsURL = cmsURL + "&type=Images";
        } else {
          cmsURL = cmsURL + "&type=Files";
        }

        tinyMCE.activeEditor.windowManager.open({
          file : cmsURL,
          title : 'Filemanager',
          width : x * 0.8,
          height : y * 0.8,
          resizable : "yes",
          close_previous : "no"
        });
      }
    };

    tinymce.init(editor_config);
  </script>

  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/lfm.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
    $('#lfm2').filemanager('file', {prefix: route_prefix});
  </script>

  <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.css" rel="stylesheet">
  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.4/summernote.js"></script>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote();
    });
  </script>
  <script>
    $(document).ready(function(){

      // Define function to open filemanager window
      var lfm = function(options, cb) {
          var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
          window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
          window.SetUrl = cb;
      };

      // Define LFM summernote button
      var LFMButton = function(context) {
          var ui = $.summernote.ui;
          var button = ui.button({
              contents: '<i class="note-icon-picture"></i> ',
              tooltip: 'Insert image with filemanager',
              click: function() {

                  lfm({type: 'image', prefix: '/laravel-filemanager'}, function(url, path) {
                      context.invoke('insertImage', url);
                  });

              }
          });
          return button.render();
      };

      // Initialize summernote with LFM button in the popover button group
      // Please note that you can add this button to any other button group you'd like
      $('#summernote-editor').summernote({
          toolbar: [
              ['popovers', ['lfm']],
          ],
          buttons: {
              lfm: LFMButton
          }
      })
    });
  </script>
	@endsection
@show