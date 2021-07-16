$("#delete-user").on("click",function() {
    $(this).parent().parent().remove();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/user/"+$(this).data('email'),
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{email:$(this).data('email'),},
        type: 'DELETE',




    });
});
