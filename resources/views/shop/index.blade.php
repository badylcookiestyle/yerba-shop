@extends('layouts.app')
@section('content')
<!--<div style="height:100px;">
    <img src="{{asset('images/layout/yerba-header.jpg')}}" class="img-fluid" style=" max-width: 100%;height: 400px;" alt="Responsive image">
</div>-->
<header>
     
    
    <!-- Background image -->
    <div
      class="text-center bg-image"
      style="
        background-image: url('http://localhost:8000/images/layout/yerba-header.jpg');
        height: 310px;
        background-repeat:no-repeat;
        background-size: cover;
      "
    >
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);height:100%">
        <div class="d-flex justify-content-center align-items-center h-100">
          <div class="text-white">
            <h1 class="mb-3">
                Your favourite yerba<br>
                in the best price!
            </h1>
          
             
          </div>
        </div>
      </div>
    </div>
    <!-- Background image -->
  </header>
    <nav class="text-center">
        ADD some filters here :)
    </nav>
    <div class="container">
      I'll display here products
    </div>
@endsection