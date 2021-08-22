var visits;
var products;
var orders;
function hideChards() {
    $('.chart').hide()
}
function getVisitsData(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/stats/visits",
        dataType: 'json',
        type: 'GET',
        success: function(data){
           visits=data.visits
        },
    });
}

function getOrdersData(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/stats/orders",
        dataType: 'json',
        type: 'GET',
        success: function(data){
            orders=data.orders
        },
    });
}
function getProductsData(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/stats/products",
        dataType: 'json',
        type: 'GET',
        success: function(data){
            orders=data.products
        },
    });
}
getVisitsData();
getOrdersData();
getProductsData();

function showVisitsChard() {
    $('.stats-labels').removeClass('font-weight-bold')
    $('#visits').addClass('font-weight-bold')
    $('#visit_chart_div').show()
    drawVisitsChart();
}

function showProductsChard() {
    $('.stats-labels').removeClass('font-weight-bold')
    $('#products').addClass('font-weight-bold')
    $('#product_chart_div').show()
    drawProductChart();
}

function showOrdersChard() {
    $('.stats-labels').removeClass('font-weight-bold')
    $('#orders').addClass('font-weight-bold')
    $('#orders_chart_div').show()
    drawOrdersChart();
}

$('#visits').click(function () {
    getVisitsData();
    hideChards();
    showVisitsChard();
})
$('#products').click(function () {
    getProductsData();
    hideChards();
    showProductsChard();
})
$('#orders').click(function () {
    getOrdersData();
    hideChards();
    showOrdersChard();
})
$(window).resize(function () {
    drawVisitsChart();
    drawOrdersChart();
    drawProductChart();
});


google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(drawVisitsChart);
google.charts.setOnLoadCallback(drawOrdersChart);
google.charts.setOnLoadCallback(drawProductChart);

function drawProductChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Amount of Orders');
    for (i = 0; i < orders.length; i++) {
        data.addRows([
            [orders[i].created_at, orders[i].amount],
        ]);
    }
    var options = {
        title: 'Amount of sold product Data',
        curveType: 'function',
        legend: {position: 'bottom'}
    };
    var chart = new google.visualization.LineChart(document.getElementById('orders_chart_div'));
    chart.draw(data, options);
}

function drawVisitsChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Amount of Views');
    for (i = 0; i < visits.length; i++) {
        data.addRows([
            [visits[i].date, visits[i].amount],
        ]);
    }
    var options = {
        title: 'Visit Data',
        curveType: 'function',
        legend: {position: 'bottom'}
    };
    var chart = new google.visualization.LineChart(document.getElementById('visit_chart_div'));
    chart.draw(data, options);
}

function drawOrdersChart() {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Topping');
    data.addColumn('number', 'Amount of Orders');
    for (i = 0; i < orders.length; i++) {
        data.addRows([
            [orders[i].created_at, orders[i].amount],
        ]);
    }
    var options = {
        title: 'Amount of orders data',
        curveType: 'function',
        legend: {position: 'bottom'}
    };
    var chart = new google.visualization.LineChart(document.getElementById('orders_chart_div'));
    chart.draw(data, options);
}

$('.chart').hide()
$('#visit_chart_div').show()
