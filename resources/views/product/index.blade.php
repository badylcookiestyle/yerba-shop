@extends('layouts.app')
@section('content')
    <div class="container my-5">
        @if($product!==null)
            <div class="col-sm-12 col-md-12 col-lg-12">
                <!-- product -->
                <div class="product-content">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div>


                                <div class="carousel-inner">


                                    <img src="{{asset('images/products/'.$product->image_path)}}" class="img-fluid"
                                         alt=""/>
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
                                <span id="productId" hidden>{{$product->id}}</span>

                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <div id="cant-buy"class="alert alert-danger">You can't buy as much products</div>
                                    <div id="can-buy"class="alert alert-success">Your product is in the cart now :)</div>
                                    <input type="number" class="my-3" id="quantity" min="0">
                                    <button class="btn btn-success btn-lg text-white" data-toggle="modal"
                                            data-target="#addProductModal" id="add-product-btn">Add to cart
                                    </button>
                                    <span class="ml-4">Quantity {{$inStock}}</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                @else
                    <h1 class="text-center text-dange">This product doesn't exist :c</h1>

                @endif
            </div>

            @push('scripts')
                <script type="text/javascript" src="{{asset('js/modals/addedModal.js')}}"></script>
    @endpush
@endsection
@section('modals')
    @extends('modals.addToCartModal')
@endsection
