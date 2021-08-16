$("#myInput").change(function () {
    var text = $(this).val()

    $('.products').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "search",
        dataType: 'json',

        data: {search: text,},
        type: 'POST',
        success: function (data) {

            if (data.products.length == 0) {
                $('.products').append(" <h2>There aren't any products yet :/</h2>")
            }
            var products = data.products
            for (i = 0; i < data.products.length; i++) {
                $('.products').append(`
            <div class="col-xs-6 col-md-4 border">
                    <div class="caption">
                    <h6><a href="product/` + products[i].id + `" class="text-dark">` + products[i].name + `</a></h6><span class="price">
            <span >` + products[i].price + `$</span>
            </div>
            <div class="product tumbnail thumbnail-3 "><a href="product/` + products[i].id + `"><img style="max-width:200px;height:auto;"src="http://localhost:8000/images/products/` + products[i].image_path + `" alt=""></a>

                </div>

            </div>
            `)
            }

        },
        error: function (data) {

        }


    });
})


