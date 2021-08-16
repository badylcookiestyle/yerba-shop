$('.alert-danger').hide()
function displayErrors(data){
    $('.alert-danger').empty()
    $('.alert-danger').show()
    data.responseJSON.errors.delivery_option ? $('.alert'.toString()).append(data.responseJSON.errors.delivery_option+'<br>'):false;
    data.responseJSON.errors.state ? $('.alert'.toString()).append(data.responseJSON.errors.state+'<br>'):false;
    data.responseJSON.errors.city ? $('.alert'.toString()).append(data.responseJSON.errors.city+'<br>'):false;
    data.responseJSON.errors.zip ? $('.alert'.toString()).append(data.responseJSON.errors.zip+'<br>'):false;
    data.responseJSON.errors.street ? $('.alert'.toString()).append(data.responseJSON.errors.street+'<br>'):false;
    data.responseJSON.errors.house ? $('.alert'.toString()).append(data.responseJSON.errors.house+'<br>'):false;
}
$('body').on('click', '#payment-btn', function () {
    var delivery=$("#inlineRadio1:checked").val();
    var city=$("#city").val()
    var state=$("#state").val()
    var zip=$("#zip").val()
    var street=$("#street").val()
    var house=$("#house").val()
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "/payment",
            dataType: 'json',
            data:{
                delivery_option:delivery,
                state:state,
                city:city,
                zip:zip,
                street:street,
                house:house,
            },
            type: 'POST',
            success: function(data){
                $('.alert').hide()
                $('.alert-success').show()
                $('.main').empty()
                $('.main').append("<div class='alert alert-success'><h3>Your order has been approved! :D</h3></div>")
            },
            error: function(data){
                displayErrors(data)
            }
        });
    }
)

