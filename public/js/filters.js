$('#filters').hide()
$( "#expander" ).on( "click", function() {
    $("#expander").slideToggle( "slow", function() {

    });
    $("#filters").slideToggle( "slow", function() {

    });
});

$("#search").on("click",function(){
    var text=$("#filter-searcher").val()
    var minPrice=$("#minPrice").val()
    var maxPrice=$("#maxPrice").val()
    var category=$("#category").val()
    var brand=$("#brand").val()
    var origin=$("#origin").val()
    var orderType=$("#order").val()
    var searchingOrder=$("#filters #searching_order:checked").val()
    console.log(text)
    console.log(searching_order)
    var data={
        search:text,
        minPrice:minPrice,
        maxPrice:maxPrice,
        category:category,
        brand:brand,
        origin:origin,
        orderType:orderType,
        searchingOrder:searchingOrder,
        filtered:true
    }
    $('.products').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "search",
        dataType: 'json',

        data:data,
        type: 'POST',
        success: function (data) {
            console.log(data)
            console.log(data.products)
            console.log(data.products.length)
            if(data.products.length==0){
                $('.products').append(" <h2>There aren't any products yet :/</h2>")
            }
            var products=data.products
            for(i=0;i<data.products.length;i++){
                $('.products').append(`
            <div class="col-xs-6 col-md-4 border">
                    <div class="caption">
                    <h6><a href="product/`+products[i].id+`" class="text-dark">`+products[i].name+`</a></h6><span class="price">
            <span >`+products[i].price+`$</span>
            </div>
            <div class="product tumbnail thumbnail-3 "><a href="product/`+products[i].id+`"><img style="max-width:200px;height:auto;"src="http://localhost:8000/images/products/`+products[i].image_path+`" alt=""></a>

                </div>

            </div>
            `)
            }

        },
        error: function (data) {
            console.log(data)
        }



    });
})
