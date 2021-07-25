@extends('layouts.app')
@section('content')


    <section class="main-dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list">
                        <a href="/#" class="list-group-item  text-white bg-dark">
                            Dashboard
                        </a>
                        <a href="/settings" class="list-group-item text-dark">Settings</a>

                    </div>

                </div>
                <div class="col-md-9">
                     <h1>Your orders</h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Status</th>
                            <th scope="col">Delivery Option</th>
                            <th scope="col">Date of placing the order</th>
                        </tr>
                        </thead>
                        <tbody id="products-body">

                        @forelse($orders as $order)

                            <tr id="{{$order->id}} ">
                            <td><a href="details/{{$order->id}}" class="btn btn-outline-info">Details</a></td>
                        @if($order->status=='sent')
                                <td class="text-success">{{$order->status}}</td>
                                @endif
                                @if($order->status=='accepted')
                                    <td class="text-info">accepted</td>
                                @endif
                            @if($order->status=='cancelled')
                                <td class="text-danger">{{$order->status}}</td>
                            @endif
                                <td>{{$order->delivery_option}}</td>
                                <td>{{$order->created_at}}</td>


                            </tr>
                        @empty
                            <h3>There're no Orders</h3>
                        @endforelse
                        <div class="d-flex my-2">
                            {{ $orders->links() }}

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
