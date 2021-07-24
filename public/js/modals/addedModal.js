$("#cant-buy").hide()
$("#can-buy").hide()
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
            $("#can-buy").show()
        },
        error: function(data){

            $("#can-buy").hide()
            $("#cant-buy").show()
        }


    });
})
