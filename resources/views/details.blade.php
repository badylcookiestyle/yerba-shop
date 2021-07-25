@extends('layouts.app')
@section('content')
    @php
        $i=0
    @endphp
    <section class="main">
        <div class="container my-5">
            <div class="block-heading">
                <h1>Details</h1>

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


                                                        <h5>Quantity: {{$product->quantity}}</h5>

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
                            <h3>Details</h3>
                            @if($products[0]->status=="accepted")
                            <h5 class="text-info">Status {{$products[0]->status}} but not sent</h5>
                            @endif
                            @if($products[0]->status=="cancelled")
                                <h5 class="text-danger">Status {{$products[0]->status}}</h5>
                            @endif
                            @if($products[0]->status=="stats")
                                <h5 class="text-success">Status {{$products[0]->status}}</h5>
                                @endif
                                <h5>Price for everything <span class="finalPrice">{{$i}}</span></h5>

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
