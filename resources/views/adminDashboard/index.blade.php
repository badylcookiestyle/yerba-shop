@extends('layouts.app')
@section('content')
    <section class="main-dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list">
                        <a href="/admin" class="list-group-item  text-white bg-dark">
                            Dashboard
                        </a>
                        <a href="/admin/productList" class="list-group-item text-dark">Products</a>
                        <a href="/admin/orders" class="list-group-item text-dark">Orders</a>
                        <a href="/admin/userList" class="list-group-item text-dark">Users</a>
                        <a href="/admin/cms" class="list-group-item text-dark">Cms</a>
                        <a href="/admin/stats" class="list-group-item text-dark">Stats</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="panel panel-default">
                        <div class="panel-heading main-color-bg">
                            <h3>Dashboard</h3>
                            <hr>
                        </div>
                        <div class="basic-stats-body">
                            <div class="col-md-3">
                                <div class="d-flex">
                                    <h4>Users {{$amountOfUsers}}</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex">
                                    <h4>Products {{$amountOfProducts}}</h4>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="d-flex">
                                    <h4>Visitors {{$amountOfVisitors}}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="products-panel-title">Latest Products</h3>
                        </div>

                        <div class="products-panel-body">
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
                                        <th scope="row"><a class="text-dark"
                                                           href="product/{{$product->id}}">{{$product->name}}</a></th>
                                        <td>{{$product->brand}}</td>
                                        <td>{{$product->origin}}</td>
                                        <td>{{$product->price}}</td>
                                    </tr>
                                @empty
                                    <h3>There're no products</h3>
                                @endforelse
                                <div class="uk-width-3-4" id="react-pagination"></div>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">

    </footer>



@endsection
