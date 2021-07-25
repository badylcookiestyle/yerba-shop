@extends('layouts.app')
@section('content')


<section class="main-dashboard my-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="list">
                    <a href="/home" class="list-group-item text-dark ">
                        Dashboard
                    </a>
                    <a href="#" class="list-group-item  text-white bg-dark  ">Settings</a>

                </div>

            </div>
            <div class="col-md-9">
                <h1>Settings panel</h1>
                <div class='container  my-5'>
                    <h1>Change password</h1>
                    <button class="btn btn-danger">Change</button>
                    <h1 >Delete account</h1>
                    <button  class="btn btn-outline-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</section>
<footer id="footer">

</footer>
@endsection
