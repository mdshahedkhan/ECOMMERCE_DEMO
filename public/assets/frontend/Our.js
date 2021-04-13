// Ajax Common Data Set & CSRF TOKEN SET FUNCTION
$.ajaxSetup({
    headers: {
        // Catch CSRF TOKEN HEADER META TAG
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).on('click', '.addCart', function () {
    event.preventDefault();
    let Slug = $(this).data('slug');
    let Url = $(this).data('url');
    $.ajax({
        url: Url,
        method: "POST",
        data: { slug: Slug },
        success: function (res) {
            if (!res.error) {
                toastr.success(res.message, 'Success');
                // Call Get Item Function
                GetCartItems();
            } else {
                toastr.warning(res.message, 'Warning');
                // Call Get Item Function
                GetCartItems();
            }
        }
    })
});

$(document).on('click', '.color-items', function () {
    $(this).toggleClass('active');
    console.log($(this).data('value'))
});

// Cart Item Get Method & Function
function GetCartItems() {
    $('#CartItems').empty();
    $.ajax({
        url: '/cart/item',
        method: 'post',
        success: function (res) {
            $('#CartItems').html(res);
        }
    })
}

$(document).on('click', '#cartItemRemove', function () {
    event.preventDefault();
    let id = $(this).data('id');
    let Url = $(this).data('url');
    $.ajax({
        url: '/cart/remove-item',
        type: "POST",
        data: { id: id },
        success: function (res) {
            toastr.success(res.message);
            GetCartItems();
        }
    });
});


function base_url(segment) {
    // get the segments
    let pathArray = window.location.pathname.split('/');
    // find where the segment is located
    let indexOfSegment = pathArray.indexOf(segment);
    // make base_url be the origin plus the path to the segment
    return window.location.origin + pathArray.slice(0, indexOfSegment).join('/') + '/';
}

// Call Automatic Function Get Items ot Cart
GetCartItems();

console.log(base_url())


// Live Searching Product
$(document).on('keyup', '#search_product', function () {
    let Search_query = $(this).val();
    $.ajax({
        url: '/product/search',
        type: "POST",
        data: { search: Search_query },
        success: function (res) {
            let result = $('.search-result').html('');
            result.append(res);
        }
    });
});
