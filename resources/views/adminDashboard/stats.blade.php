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
                        <button class="btn btn-link text-dark btn-lg">Visits</button>
                        <button class="btn btn-link text-dark btn-lg">Products</button>
                        <button class="btn btn-link text-dark btn-lg">Orders</button>
                    </div>
                    <div class="col-12 current">
                        <div class="col-12 container-fluid"id="chart_div"></div>
                            {{$visits}}



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

            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Year', 'Sales', 'Expenses'],
                    ['2004',  1000,      400],
                    ['2005',  1170,      460],
                    ['2006',  660,       1120],
                    ['2007',  1030,      540]
                ]);

                var options = {
                    title: 'Company Performance',
                    curveType: 'function',
                    legend: { position: 'bottom' }
                };

                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));

                chart.draw(data, options);
            }
        </script>




    @endpush

@endsection
