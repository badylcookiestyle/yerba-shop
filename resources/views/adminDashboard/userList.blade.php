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
                        <a href="productList" class="list-group-item text-dark">Products</a>
                        <a href="#" class="list-group-item text-dark">Orders</a>
                        <a href="#" class="list-group-item text-white  bg-dark">Users</a>
                    </div>

                </div>
                <div class="col-md-9">
                    <h1>Users list</h1>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Mail</th>
                            <th scope="col">Date of register</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="products-body">
                        @forelse($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at}}</td>
                                <td><button data-email="{{$user->email}}" id="delete-user" class="btn btn-danger">delete</button></td>
                            </tr>
                        @empty
                            <h3>There're users yet ;/</h3>
                        @endforelse
                        <div class="d-flex my-2">
                            {{ $users->links() }}

                        </div>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>
    <footer id="footer">

    </footer>

<script type="text/javascript"  src="{{asset('js/deleteUser.js')}}">
</script>

@endsection
