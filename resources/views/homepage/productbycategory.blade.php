@extends('homepage.layout.master')
@section('header')
@endsection


  @section('body')
<div id="heading-breadcrumbs">
  <div class="container">
    <div class="row d-flex align-items-center flex-wrap">
      <div class="col-md-7">
        <h1 class="h2">{{$name}}</h1>
      </div>
      <div class="col-md-5">
        <ul class="breadcrumb d-flex justify-content-end">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item ">Produk</li>
          <li class="breadcrumb-item active">{{$name}}</li>
        </ul>
      </div>
    </div>
  </div>
</div>

        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <p class="text-muted lead"></p>
              <div class="row products products-big">
                @if(count($product) > 0)
                @foreach($product as $product)
                <div class="col-lg-4 col-md-6">
                  <div class="product">
                    <div class="image"><a href="shop-detail.html"><img src="{{ url($product->photo )}}" alt="" class="img-fluid image1"></a></div>
                    <div class="text">
                      <h3 class="h5"><a href="shop-detail.html">{{$product->name}}</a></h3>
                      <p class="price">Rp {{number_format($product->price)}}</p>
                    </div>
                  </div>
                </div>
                @endforeach
              @else
              <h4>Produk Tidak Tersedia</h4>
              @endif
          
          </div>
        </div>
         <div class="col-md-3">
              <!-- MENUS AND FILTERS-->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Kategori</h3>
                </div>
                <div class="panel-body">
                      <ul class="nav nav-pills flex-column">
                   @foreach($category as $cat)
                    <li class="nav-item">
                      <a href="{{url('/category/'.$cat->slug)}}" class="nav-link">{{$cat->name}}</a>
                    </li>

                        
                        <!-- <li class="nav-item"><a href="shop-category.html" class="nav-link">Skirts</a></li>
                        <li class="nav-item"><a href="shop-category.html" class="nav-link">Pants</a></li>
                        <li class="nav-item"><a href="shop-category.html" class="nav-link">Accessories</a></li> -->
                     
                    
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
      </div>
    </div>


              
    

@endsection


              

 @section('footer')
 @endsection
 @show