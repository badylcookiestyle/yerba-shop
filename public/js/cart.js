$('body').on('click', '.delete-product', function () {
     console.log($(this).data('product-id'))
    $(this).parent().parent().parent().parent().parent().remove()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/cart/"+$(this).data('product-id'),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:$(this).data('product-id')},
        type: 'DELETE',
    });
});
