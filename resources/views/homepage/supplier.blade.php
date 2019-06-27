@extends('homepage.layout.master')
@section('header')
@endsection


  @section('body')
    <div id="heading-breadcrumbs">
        <div class="container">
          <div class="row d-flex align-items-center flex-wrap">
            <div class="col-md-7">
              <h1 class="h2">Supplier</h1>
            </div>
            <div class="col-md-5">
              <ul class="breadcrumb d-flex justify-content-end">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Suppllier</li>
              </ul>
            </div>
          </div>
        </div>
      </div
  <div id="content">
        <div class="container">
          <section class="bar mb-0">
            <div class="row">
              <div class="col-md-12">
                <div class="heading">
                  <h2>Supplier Kami</h2>
                </div>
              
                <div class="row text-center">
                  @foreach($user as $user)
                  <div class="col-md-3">
                    <div data-animate="fadeInUp" class="team-member">
                      <div class="image"><a href="team-member.html"><img src="{{url($user->photo)}}" alt="" class="img-fluid rounded-circle"></a></div>
                      <h3><a href="{{url('supplier/'.$user->id)}}">{{$user->name}}</a></h3>
                      <p class="role">{{date('d-m-Y',strtotime($user->created_at))}}</p>
                      <p class="role">{{$user->role}}</p>
                      <ul class="social list-inline">
                        <li class="list-inline-item"><a href="#" class="external facebook"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="external twitter"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="email"><i class="fa fa-envelope"></i></a></li>
                      </ul>
                      <div class="text">
                        <p>{{$user->address}}</p>
                      </div>
                     
                    </div>

                  </div>
                    @endforeach
                  <!-- /.team-member-->
                  
                  <!-- /.team-member-->
               
                </div>
              </div>
            </div>
          </section>
        </div>
  @endsection


              

 @section('footer')
 @endsection
 @show
