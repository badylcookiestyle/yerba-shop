@extends('layouts.app')
@section('content')
<div class="container my-5">   
 @if($product!==null)
 <div class="col-sm-12 col-md-12 col-lg-12">
    <!-- product -->
    <div class="product-content">
        <div class="row">
            <div class="col-md-5 col-sm-12 col-xs-12">
                <div >
                     
                         
                        <div class="carousel-inner">
                           
                          
                                <img   src="{{asset('images/products/'.$product->image_path)}}" class="img-fluid" alt="" />
                             
                             
                        
                         
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-md-offset-1 col-sm-12 col-xs-12">
                <h2 class="basic-info">
                   {{$product->name}}
                     
                </h2>
                <h4>Origin {{$product->origin}}</h4>
                <h4>Brand {{$product->brand}}</h4>
                <hr>
                <h3 class="price">
                    Price {{$product->price}}
                  
                </h3>
                <hr>
                <div class="description ">
                     <h1>Description</h1>
                    <p>{{$product->description}}</p>
                         
                        
                </div>
                <hr />
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <a   class="btn btn-success btn-lg text-white">Add to cart </a><span class="ml-4">Quantity {{$inStock}}</span>
                    </div>
                     
                </div>
            </div>
        </div>
    </div>
    
@else
<h1 class="text-center text-dange">This product doesn't exist :c</h1>
    
@endif
</div>
@endsection