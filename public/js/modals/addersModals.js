$('#product-category-errors').hide()
$('#product-brand-errors').hide()
$('#product-country-errors').hide()
$("#add-category-btn").click(function () {

    $('#product-category-errors').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var form_data = new FormData();
    form_data.append('category', $('#add-product-category-text').val());
    $.ajax({
        url: "/adders/category",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function (data) {
            $('#addCategoryModal').hide();
            $('.modal-backdrop').hide();
            $('#product-category-errors').hide()

            $("#productCategory").append(new Option(data.success, data.success));
            $('#add-product-category-text').val("")
        },
        error: function (data) {
            $('#product-category-errors').show()
            $('#product-category-errors').text(data.responseJSON.message)


        }


    });
})
$("#add-brand-btn").click(function () {

    $('#product-brand-errors').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var form_data = new FormData();
    form_data.append('brand', $('#add-product-brand-text').val());
    $.ajax({
        url: "/adders/brand",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function (data) {
            $('#addBrandModal').hide();
            $('.modal-backdrop').hide();
            $('#product-brand-errors').hide()
            $("#productBrand").append(new Option(data.success, data.success));
            $('#add-product-brand-text').val("")
        },
        error: function (data) {
            $('#product-brand-errors').show()
            $('#product-brand-errors').text(data.responseJSON.message)


        }


    });
})
$("#add-country-btn").click(function () {

    $('#product-country-errors').empty()
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var form_data = new FormData();
    form_data.append('country', $('#add-product-country-text').val());
    $.ajax({
        url: "/adders/country",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'POST',
        success: function (data) {
            $('#addCountryModal').hide();
            $('#addCountryModal').hide();
            $('.modal-backdrop').hide();
            $("#productOrigin").append(new Option(data.success, data.success));
            $('#add-product-country-text').val("")
        },
        error: function (data) {
            $('#product-country-errors').show()
            $('#product-country-errors').text(data.responseJSON.message)

        }


    });
})

