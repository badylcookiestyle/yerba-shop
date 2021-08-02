$("#about-change").click(function(){
    console.log("clicked")
    $('#product-errors').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var file_data = $('#backgroundImage').prop('files')[0];
    var form_data = new FormData();
    form_data.append('file',file_data);
    form_data.append('title',$("#title").val())
    form_data.append('description',$("#description").val())
    console.log(form_data)
    $.ajax({
        url: "/cms/about",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function(data){
            console.log(data)

        },
        error: function(data){
            console.log(data)

        }


    });
})
