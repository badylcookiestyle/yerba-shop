function updateItem(id,quantity){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/cart",
        dataType: 'json',
        data:{
            id:id,
            quantity:quantity,
        },
        type: 'PATCH',
        success: function(data){
            console.log(data)
        },
        error: function(data){
            console.log(data)
        }
    });
}
function deleteItem(id){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/cart/"+id,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:id},
        type: 'DELETE',
    });
}
$('body').on('click', '.delete-product', function () {
    console.log($(this).data('product-id'))
    $(this).parent().parent().parent().parent().parent().remove()
    deleteItem($(this).data('product-id'))

});
$('body').on('change','.quantity-input',function(){
    var kek=$(this).parent().parent().parent().parent();
    var finalPrice=parseFloat($('body').find('.finalPrice').text(),10)
    var oldMultipliedPrice=parseFloat(kek.find('.multipliedPrice').text(),10)
    var pricePerOne=parseFloat(kek.find(".pricePerOne").text(),10)
    var multipliedPrice=parseFloat(pricePerOne*$(this).val(),10)
    kek.find(".multipliedPrice").text(multipliedPrice)
    var resetPrice=finalPrice-oldMultipliedPrice
    var newFinalPrice=resetPrice+multipliedPrice

    $('body').find('.finalPrice').text(newFinalPrice)

    updateItem(kek.find(".delete-product").data('product-id'),$(this).val())

})
