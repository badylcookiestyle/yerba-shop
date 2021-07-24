var cId=0;
function changeStatus(status){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    console.log("z"+cId)
    $.ajax({
        url: "/order",
        dataType: 'json',

        data: {id: cId,status:status},
        type: 'patch',
        success: function (data) {
            console.log(data)
        },
        error: function (data) {
            console.log(data)
        }

    });
}
$('body').on('click','.change-status', function(){

    console.log($(this).data('id'))
    currentId=$(this).data('id')
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/order/"+currentId,
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data:{id:currentId},
        type: 'GET',
        success: function(data){
           // console.log(data.success[0].name)
            $('.modal-body').empty()
            cId=currentId
            for(i=0;i<data.success.length;i++){
                $('.modal-body').append('<h2>products</h2>')
                $('.modal-body').append('<h4>'+data.success[i].name+'</h4><br>')
            }
        }



    });
});

$('html').on('click','.accept-order', function() {
 var status='accepted'


changeStatus(status)

})
$('html').on('click','.cancel-order', function() {
    var status='cancelled'


    changeStatus(status)

})
