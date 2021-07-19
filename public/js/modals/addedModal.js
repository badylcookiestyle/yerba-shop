console.log("brch")
$("#cant-buy").hide()
$("#add-product-btn").click(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });




    $.ajax({
        url: "/cart",
        dataType: 'json',
        data:{
            id:$('#productId').text(),
            quantity:$('#quantity').val(),
        },
        type: 'POST',
        success: function(data){

            $("#cant-buy").hide()
        },
        error: function(data){


            $("#cant-buy").show()
        }


    });
})
