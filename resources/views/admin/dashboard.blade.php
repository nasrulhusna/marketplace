@extends('admin.layout.master')
	<!-- header -->
	@section('header')
		
	@endsection

	<!-- body -->
	@section('body')
		<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          Selamat Datang Di Halaman Admin
        </div>
        <!-- /.box-body -->
       <!--  <div class="box-footer">
          Website Marketplace STMIK SUMEDANG
        </div> -->
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
	@endsection

	<!-- footer -->
	@section('footer')
		
	@endsection
@show