$('#product-errors').hide()
var currentId=""
var currentName=""
var productId=""
function current(a,b){

    currentId=a
    currentName=b
    $('#product-name').text("It's name is "+currentName)
}
function setOldData(id,name){
    var currentRow=$("#tr"+id);

    $("#productNameEdit").val(currentRow.find("th a:eq(0)").text())
    $("#productBrandEdit").val(currentRow.find("td:eq(0)").text())
    $("#productOriginEdit").val(currentRow.find("td:eq(1)").text())
    $("#productPriceEdit").val(currentRow.find("td:eq(2)").text())
    $("#productQuantityEdit").val(currentRow.find("td:eq(3)").text())
    $("#productDescriptionEdit").val(currentRow.find("td:eq(4)").text())
    var cid=currentRow.find("td:eq(5)").text();
    $("#productCategoryEdit").val($("body").find("[data-cid='"+cid+"']").val())
    productId=currentRow.find("td:eq(6)").text();

}
function displayProductErrors(data){
    $('#product-errors').show()
    data.responseJSON.errors.productName ? $('#product-errors'.toString()).append(data.responseJSON.errors.productName+'<br>'):false;
    data.responseJSON.errors.productBrand  ? $('#product-errors'.toString()).append(data.responseJSON.errors.productBrand+'<br>'):false;
    data.responseJSON.errors.productCategory  ?  $('#product-errors'.toString()).append(data.responseJSON.errors.productCountry+'<br>'):false;
    data.responseJSON.errors.productQuantity  ?  $('#product-errors'.toString()).append(data.responseJSON.errors.productQuantity+'<br>'):false;
    data.responseJSON.errors.productDescription  ? $('#product-errors'.toString()).append(data.responseJSON.errors.productDescription+'<br>'):false;
    data.responseJSON.errors.productCategory  ?  $('#product-errors'.toString()).append(data.responseJSON.errors.productCategory+'<br>'):false;
    data.responseJSON.errors.productPrice  ? $('#product-errors'.toString()).append(data.responseJSON.errors.productPrice+'<br>'):false;
    data.responseJSON.errors.file ?   $('#product-errors'.toString()).append(data.responseJSON.errors.file+'<br>'):false;
}
$('#product-errors').hide()
$('#product-edit-errors').hide()
$("#add-product-btn").click(function(){

    $('#product-errors').empty()
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
    form_data.append('productQuantity',$('#productQuantity').val());
    form_data.append('file',file_data);


    console.log(form_data)
    $.ajax({
        url: "/product",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(data){
            $('#products-body').prepend(`
                  <tr id='tr'>
                    <th scope="row">
                    <button class="btn btn-info btn-sm m-1"  onclick="current(`+data.id+`,`+$('#productName').val()+`)"data-id="`+data.id+`" data-toggle="modal" data-target="editProductModal">edit</button>
                    <button class="btn btn-danger btn-sm m-1"    onclick="current(`+data.id+`,`+$('#productName').val()+`)" data-toggle="modal" data-target="#deleteProductModal" data-id="`+data.id+`">delete</button>
                    <a class="text-dark" href="#">`+$('#productName').val()+`</a></th>
                    <td>`+$('#productBrand').val()+`</td>
                    <td>`+$('#productOrigin').val()+`</td>
                    <td>`+$('#productPrice').val()+`</td>
                    <td>`+$('#productQuantity').val()+`</td>
                  </tr>
                `)
            $('#addProductModal').modal('toggle')

            $('body').removeClass('modal-open')
            $('.modal-backdrop').remove()
            $(':input').val('');

        },
        error: function(data){
            console.log(data)
            $('#product-errors').empty()
            displayProductErrors(data)
        }


    });
})

$('#delete-product-btn').click(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/product/"+currentId,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:currentId},
        type: 'DELETE',
        success: function(data){
            $("#tr"+currentId).remove()
            $('#deleteProductModal').modal('toggle')
            $('body').removeClass('modal-open')
            $('.modal-backdrop').remove()
            $(':input').val('');
        },




    });
})

$("#edit-product-btn").click(function(){
    console.log("pacz")
    console.log("clicked")
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var file_data = $('#fileEdit').prop('files')[0];
    var form_data = new FormData();
    form_data.append('productNameEdit',$('#productNameEdit').val());
    form_data.append('productBrandEdit',$('#productBrandEdit').val());
    form_data.append('productOriginEdit',$('#productOriginEdit').val());
    form_data.append('productDescriptionEdit',$('#productDescriptionEdit').val());
    form_data.append('productCategoryEdit',$('#productCategoryEdit').val());
    form_data.append('productPriceEdit',$('#productPriceEdit').val());
    form_data.append('productQuantityEdit',$('#productQuantityEdit').val());
    form_data.append('productIdEdit',productId);
    form_data.append('fileEdit',file_data);



    $.ajax({
        url: "/product",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'PATCH',
        success: function(data){
            $('#product-errors').empty()
            $('#editProductModal').modal('toggle')

            $('body').removeClass('modal-open')
            $('.modal-backdrop').remove()
            $(':input').val('');

        },
        error: function(data){
            console.log(form_data)
            console.log(data)
            $('#product-errors').empty()
            displayProductErrors(data)
        }


    });
})
