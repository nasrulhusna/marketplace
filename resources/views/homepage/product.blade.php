@extends('homepage.layout.master')
@section('header')
@endsection


  @section('body')
  <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">All Produk</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
  <div class="container text-center">
          <div class="col-md-12">
            <div class="heading text-center">
              <h2>Semua Produk</h2>
            </div>
            <div class="row">
              @foreach($product as $product)
              <div class="col-lg-4 col-md-6">
                <div class="box-simple">
                  <div class="icon-outlined"><img src="{{ $product->photo }}" width="200%" class="img img-thumbnail img-circle"></div>
                 <h3 class="h4"> <a href="">{{ $product->name }}</a></h3>
                  <p>{{strip_tags( $product->description)}}.</p>
                  <div class="text">
                    <p>Rp {{ number_format($product->price )}}</p>
                  </div>
                </div>

              </div>
              @endforeach
         
             

            </div> 

            <div class="col-md-12">
            <div class="heading text-center">
              <h2>From our blog</h2>
            </div>
            <p class="lead">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. <a href="blog.html">Check our blog!</a></p>
            <div class="row">
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="{{asset('user/img/portfolio-4.jpg')}}" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">Fashion Now </a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="#" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="{{asset('user/img/portfolio-3.jpg')}}" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">What to do</a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="#" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="{{asset('user/img/portfolio-5.jpg')}}" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">5 ways to look awesome</a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="#" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="home-blog-post">
                  <div class="image"><img src="{{asset('user/img/portfolio-6.jpg')}}" alt="..." class="img-fluid">
                    <div class="overlay d-flex align-items-center justify-content-center"><a href="#" class="btn btn-template-outlined-white"><i class="fa fa-chain"> </i> Read More</a></div>
                  </div>
                  <div class="text">
                    <h4><a href="#">Fashion Now </a></h4>
                    <p class="author-category">By <a href="#">John Snow</a> in <a href="blog.html">Webdesign</a></p>
                    <p class="intro">Fifth abundantly made Give sixth hath. Cattle creature i be don't them behold green moved fowl Moved life us beast good yielding. Have bring.</p><a href="#" class="btn btn-template-outlined">Continue Reading</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
  @endsection


              

 @section('footer')
 @endsection
 @show
