@extends('homepage.layout.master')
@section('header')
@endsection


  @section('body')
<div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">{{$product->name}}</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="shop-category.html">Kategori</a></li>
                <li class="breadcrumb-item"><a href="shop-category.html">Produk</a></li>
                <li class="breadcrumb-item active">{{$product->name}}</li>
              </ul>
            </div>
          </div>
        </div>
      </div>

        <div class="container">
          <div class="row bar">
            <div class="col-md-9">
              <p class="text-muted lead"></p>
              
              <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Scroll to product details, material & care and sizing</a></p>
              <div id="productMain" class="row">
                <div class="col-sm-6">
                  <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                    <div> <img src="{{url($product->photo)}}" alt="" class="img-fluid"></div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="box">
                    <form>

                      <div class="sizes">
                        <p class="text-center"></p>
                        
                      </div>
                      <p class="price"> Rp <?php echo number_format($product->price,'0',',','.'); ?></p>
                      <p class="text-center">Stok : {{$product->stock}}</p>
                      <p class="text-center">
                       <!--  <button type="submit" class="btn btn-template-outlined"><i class="fa fa-whatsapp"></i> Chat Penjual</button> -->
                       <a href="https://wa.me/{{$user->phone}}?text=Assalamu%27alaikum%2C%20admin%20saya%20mau%20order%20barang....." class="btn btn-template-outlined"><i class="fa fa-whatsapp"></i> Chat Via WhatsApp</a>
                        
                      </p>
                    </form>
                  </div>
                </div>
              </div>
              <div id="details" class="box mb-4 mt-4">
               {!! $product->description !!}
              </div>
              <div id="product-social" class="box social text-center mb-5 mt-5">
                <h4 class="heading-light">Show it to your friends</h4>
                <ul class="social list-inline">
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                  <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="email"><i class="fa fa-envelope"></i></a></li>
                </ul>
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