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
                <a href="#" class="list-group-item text-dark">Users</a>
              </div>
             
        </div>
        <div class="col-md-9">
            <h1>Products</h1>
           
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Brand</th>
                    <th scope="col">Origin</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                </tr>
                </thead>
                <tbody id="products-body">
                @forelse($products as $product)
                <tr>
                    <th scope="row"><a class="text-dark" href="{{route('current.product',['id'=>$product->id])}}">{{$product->name}}</a></th>
                    <td>{{$product->brand}}</td>
                    <td>{{$product->origin}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$quantity[$loop->index]}}</td>
                </tr>
                @empty
                    <h3>There're no products</h3>
                @endforelse
                <div class="d-flex my-2">
                {{ $products->links() }} 
                <button type="button" class="btn btn-outline-primary ml-5 btn-sm" data-toggle="modal" data-target="#addProductModal">
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
@section('modals')
@extends('layouts.addProductModal')
@endsection
<script>
  
  $("#add-product-btn").click(function(){
    console.log("clicked")
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
   
    var file_data = $('#file').prop('files')[0];   
    var form_data = new FormData();
    form_data.append('productName',$('#productName').val());
    form_data.append('productBrand',$('#productBrand').val());
    form_data.append('productOrigin',$('#productOrigin').val());
    form_data.append('productDescription',$('#productDescription').val());
    form_data.append('productCategory',$('#productCategory').val());
    form_data.append('productPrice',$('#productPrice').val());                                         
    form_data.append('file',file_data);
   
    
                               
    $.ajax({
      url: "/product",
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,                         
        type: 'POST',
        success: function(data){
          $('#products-body').prepend(`
                  <tr>
                    <th scope="row"><a class="text-dark" href="#">`+$('#productName').val()+`</a></th>
                    <td>`+$('#productBrand').val()+`</td>
                    <td>`+$('#productOrigin').val()+`</td>
                    <td>`+$('#productPrice').val()+`</td>
                  </tr>
                `) 
          $('#addProductModal').modal('toggle')
          $('body').removeClass('modal-open')
          $('.modal-backdrop').remove() 
         
        },
        error: function(data){
          console.log(data)
        }

     });
  })
</script>
  
@endsection