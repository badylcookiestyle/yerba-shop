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
                        <a href="#" class="list-group-item text-white  bg-dark">Products</a>
                        <a href="#" class="list-group-item text-dark">Orders</a>
                        <a href="userList" class="list-group-item text-dark">Users</a>
                    </div>

                </div>
                <div class="col-md-9">
                    <h1>Products</h1>

                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Status</th>
                            <th scope="col">Delivery Option</th>
                            <th scope="col"Date of placing the order</th>
                        </tr>
                        </thead>
                        <tbody id="products-body">
                        @forelse($orders as $order)
                            <tr id="{{$order->id}}">
                                <th scope="row">

                                    <button class="btn btn-danger btn-sm m-1"
                                           data-toggle="modal"
                                            data-target="#deleteProductModal" data-id="{{$order->id}}">delete
                                    </button>

                                </th>

                                <td>{{$order->status}}</td>
                                <td>{{$order->delivery_option}}</td>
                                <td>{{$order->created_at}}</td>


                            </tr>
                        @empty
                            <h3>There're no Orders</h3>
                        @endforelse
                        <div class="d-flex my-2">
                            {{ $orders->links() }}
                            <button type="button" class="btn btn-outline-primary ml-5 btn-sm" data-toggle="modal"
                                    data-target="#addProductModal">
                                Add new product
                            </button>
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
@push('scripts')
    <script type="text/javascript" src="{{asset('js/modals/productModals.js')}}">

    </script>
@endpush
@section('modals')
    @extends('modals.addProductModal')
    @extends('modals.editProductModal')
    @extends('modals.deleteProductModal')
@endsection
