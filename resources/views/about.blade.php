@extends('layouts.app')
@section('content')
    <div class="container text-center my-5 text-white">
        <h1 id="title"> </h1>
        <h5 id="description">

        </h5>
    </div>
    @push('scripts')
        <script>

            $.getJSON("{{asset('jsons/about.json')}}",function(data){
                var json=data
                $("#title").text(json.data.title)
                $("#description").text(json.data.description)
            });
        </script>
    @endpush
@endsection
<style>
    body{



background:  url('http://localhost:8000/images/layout/yerba-about.jpg')no-repeat center center fixed;
background-size:cover;
   }
     </style>
