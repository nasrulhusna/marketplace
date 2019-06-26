@extends('admin.layout.master')
	<!-- header -->
	@section('header')
		
	@endsection

	<!-- body -->
	@section('body')
		<div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Dashboard</h3>

         
        </div>
        <div class="box-body">
         <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-list"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Kategori</span>
              <span class="info-box-number">{{ count($category)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-table"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Produk</span>
              <span class="info-box-number">{{ count($product)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">User</span>
              <span class="info-box-number">{{ count($user)}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
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