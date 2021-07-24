@extends('layouts.app')
@section('content')
    @php
    $i=0
    @endphp
    <section class="main">
        <div class="container my-5">
    <div class="block-heading">
        <h1>Shopping Cart</h1>

    </div>
    <div class="content my-5">

        <div class="row">
            <div class="col-md-12 col-lg-8">
                <div class="items">
                    @forelse($products as $product)
                    <div class="product border">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-fluid mx-auto d-block image" src="{{asset('images/products/'.$product->image_path)}}">
                            </div>
                            <div class="col-md-8">
                                <div class="info">
                                    <div class="row">
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="product/{{$product->id}}" class="text-dark font-weight-bold">{{$product->name}}</a>
                                                <div class="product-info">
                                                    <div>Brand <span class="value brand">{{$product->brand}}</span></div>
                                                    <div>Origin <span class="value ">{{$product->origin}}</span></div>
                                                    <div>Price per one <span class="value pricePerOne">{{$product->price}}</span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 quantity">
                                            <span>In stock {{$product->z}}</span>
                                            <label for="quantity">Quantity:</label>
                                            <input id="quantity" type="number" value ="{{$product->quantity}}" min="1" max="{{$product->z}}"class="form-control quantity-input">

                                        </div>
                                        <div class="col-md-3 price">
                                            <span class="multipliedPrice">{{$product->quantity*$product->price}}$</span>
                                            <button class="btn btn-danger delete-product"   data-product-id="{{$product->id}}">delete</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @php
                            $i+=($product->price*$product->quantity)
                    @endphp
                    @empty
                        <h1>There are no products yet ;/</h1>
                    @endforelse

                </div>
            </div>
            <div class="col-md-12 col-lg-4">
                <div class="summary">
                    <h3>Summary</h3>

                    <h4>Price for everything <span class="finalPrice">{{$i}}</span></h4>
                    <button type="button" class="btn btn-outline-primary btn-lg btn-block my-5">Payment</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    </section>
    </div>

    </section>


@endsection
@push('scripts')
    <script type="text/javascript" src="{{asset('js/cart.js')}}">

    </script>
@endpush
