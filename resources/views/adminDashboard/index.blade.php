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
                <a href="#" class="list-group-item text-dark">Products</a>
                <a href="#" class="list-group-item text-dark">Orders</a>
                <a href="#" class="list-group-item text-dark">Users</a>
              </div>
             
        </div>
        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading main-color-bg">
                  <h3 >Dashboard</h3>
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
                            <h4>Visitors  0</h4>
                           
                           
                        </div>
                      </div>
                     
                </div>
              </div>
              <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="products-panel-title">Latest Products</h3>
                  </div>
                  <div class="products-panel-body">
                    <!-- I'll create table here -->
                  </div>
                </div>
        </div>
      </div>
    </div>
  </section>
  <footer id="footer">
   
  </footer>


  
@endsection