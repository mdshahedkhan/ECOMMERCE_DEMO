$.ajaxSetup({
    headers: {
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
            } else {
                toastr.warning(res.message, 'Warning');
            }
        }
    })
});

$(document).on('click', '.color-items', function () {
    $(this).toggleClass('active');
    console.log($(this).data('value'))
});
