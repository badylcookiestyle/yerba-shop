@extends('layouts.app')
@extends('cms.cms')
@section('content')
    <section class="main-dashboard my-5">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="list">
                        <a href="/admin" class="list-group-item  text-dark">
                            Dashboard
                        </a>
                        <a href="/admin/productList" class="list-group-item text-dark">Products</a>
                        <a href="/admin/orders" class="list-group-item text-dark">Orders</a>
                        <a href="/admin/userList" class="list-group-item text-dark">Users</a>
                        <a href="/admin/cms" class="list-group-item text-dark">Cms</a>
                        <a href="/admin/stats" class="list-group-item text-white bg-dark">Stats</a>
                    </div>
                </div>
                <div class="col-md-9 my-2">
                    <header class="col-12 border text-center bg-dark text-white">
                         <h2>Stats panel</h2>


                    </header>
                    <div class="text-center">
                        <button class="btn btn-link text-dark btn-lg font-weight-bold stats-labels" id="visits">Visits</button>
                        <button class="btn btn-link text-dark btn-lg stats-labels" id="products">Products</button>
                        <button class="btn btn-link text-dark btn-lg stats-labels" id="orders">Orders</button>
                    </div>
                    <div class="col-12 current">
                        <div class="col-12 container-fluid chart"id="visit_chart_div"></div>
                        <div class="col-12 container-fluid chart"id="products_chart_div"></div>
                        <div class="col-12 container-fluid chart"id="orders_chart_div"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer id="footer">

    </footer>
    @push('scripts')

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">


        </script>
        <script type="text/javascript" src="{{asset('js/stats/stats.js')}}">

        </script>




    @endpush

@endsection
