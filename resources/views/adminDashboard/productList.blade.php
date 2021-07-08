@extends('layouts.app')
@section('content')
 

  <section class="main-dashboard my-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <div class="list">
                <a href="/admin" class="list-group-item  text-dark">
                       Dashboard
                </a>
                <a href="admin/productList" class="list-group-item text-white  bg-dark">Products</a>
                <a href="#" class="list-group-item text-dark">Orders</a>
                <a href="#" class="list-group-item text-dark">Users</a>
              </div>
             
        </div>
        <div class="col-md-9">
            <h1>Products</h1>
           
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Price</th>
                </tr>
                </thead>
                <tbody>
                @forelse($products as $product)
                <tr>
                    <th scope="row"><a class="text-dark" href="{{route('current.product',['id'=>$product->id])}}">{{$product->name}}</a></th>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->origin}}</td>
                    <td>{{$product->price}}</td>
                </tr>
                @empty
                    <h3>There're no products</h3>
                @endforelse
                <div class="d-flex my-2">
                {{ $products->links() }} <button class="btn btn-info  btn-sm ml-5">add new product</button>
                </div>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer">
   
  </footer>


  
@endsection