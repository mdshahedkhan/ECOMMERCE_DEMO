$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
    }
});
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});


// Brand Status Change With Ajax Request
$('body').on('change', '#BrandStatus', function () {
    let id = $(this).data('id');
    if (this.checked) {
        var status = 'active';
    } else {
        var status = 'inactive';
    }
    let url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: 'brand/status-brand/' + id + '/' + status,
        method: "POST",
        success: function (result) {
            console.log(result)
            $('.loader').hide();
        }
    });
});

// Category Status Change With Ajax Request
$('body').on('change', '#CategoryStatus', function () {
    let id = $(this).data('id');
    if (this.checked) {
        var status = 'active';
    } else {
        var status = 'inactive';
    }
    let url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: 'category/status-category/' + id + '/' + status,
        method: "POST",
        success: function (result) {
            console.log(result)
            $('.loader').hide();
        }
    });
});

// Category Status Change With Ajax Request
$('body').on('change', '#ProductStatus', function () {
    let id = $(this).data('id');
    if (this.checked) {
        var status = 'active';
    } else {
        var status = 'inactive';
    }
    let url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: 'product/status-product/' + id + '/' + status,
        method: "POST",
        success: function (result) {
            console.log(result)
            $('.loader').hide();
        }
    });
});


// Special Price Show & Hide
$('#special_price').click(function () {
    $('#special_box').slideToggle();
});

// Warranty Box Show
$('#wYES').change(function () {
    $('#WarrantyBox').slideDown();
});
// Warranty Box Hide
$('#wNO').change(function () {
    $('#WarrantyBox').slideUp();
});

function ConvertToSlug(text, place) {
    text = text.toLowerCase();
    text = text.replace(/[^a-zA-Z0-9]+/g, '-');
    $(place).val(text);
}

// Call Product Image Gallery View Function
$('body').on('change', '#image', function () {
    imagePreview(this, '.product-gallery');
});

// Call Thumbnail Function
$('body').on('change', '#thumbnail', function () {
    imagePreview(this, '.thumbnail');
});

// Image Preview Function
function imagePreview(input, place) {
    if (input.files) {
        $(place).html('');
        let fileAmount = input.files.length;
        for (let i = 0; i < fileAmount; i++) {
            let Reader = new FileReader();
            console.log("OK")
            Reader.onload = function (event) {
                $(place).prepend('<img style="width: 100px; height: 120px" class="img-fluid img-thumbnail" src="' + event.target.result + '" style="height: 100px; width: 100px" >');
                $($.parseHTML('')).attr('src', event.target.result);
            }
            Reader.readAsDataURL(input.files[i]);
        }
    }
}


$('#FormSubmit').submit(function (e) {
    e.preventDefault();
    let Errors = [];
    // Name Field Validation
    if ($('#FormSubmit input[name="name"]').val() == '') {
        $('#FormSubmit input[name="name"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="name"]').removeClass('is-invalid');
        if ($('#FormSubmit input[name="name"]').val().length < 3) {
            $('.valid-feedback-length').show();
        } else {
            $('.valid-feedback-length').hide();
        }
    }
    // Slug Field Validation
    if ($('#FormSubmit input[name="slug"]').val() == '') {
        $('#FormSubmit input[name="slug"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="slug"]').removeClass('is-invalid');
    }
    // Category Field id Validation
    if ($('#FormSubmit select[name="category"]').val() == '') {
        $('#FormSubmit select[name="category"]').addClass('is-invalid');
    } else {
        $('#FormSubmit select[name="category"]').removeClass('is-invalid');
    }
    // Model Field Validation
    if ($('#FormSubmit input[name="model"]').val() == '') {
        $('#FormSubmit input[name="model"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="model"]').removeClass('is-invalid');
    }
    // Buying Price Field Validation
    if ($('#FormSubmit input[name="buying_price"]').val() == '') {
        $('#FormSubmit input[name="buying_price"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="buying_price"]').removeClass('is-invalid');
    }
    // Buying Price Field Validation
    if ($('#FormSubmit input[name="selling_price"]').val() == '') {
        $('#FormSubmit input[name="selling_price"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="selling_price"]').removeClass('is-invalid');
    }
    // Quantity Field Validation
    if ($('#FormSubmit input[name="quantity"]').val() == '') {
        $('#FormSubmit input[name="quantity"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="quantity"]').removeClass('is-invalid');
    }
    // Quantity Field Validation
    if ($('#FormSubmit input[name="sku_code"]').val() == '') {
        $('#FormSubmit input[name="sku_code"]').addClass('is-invalid');
    } else {
        $('#FormSubmit input[name="sku_code"]').removeClass('is-invalid');
    }
    // Quantity Field Validation
    if ($('#FormSubmit textarea[name="description"]').val() == '') {
        $('#FormSubmit textarea[name="description"]').addClass('is-invalid');
    } else {
        $('#FormSubmit textarea[name="description"]').removeClass('is-invalid');
    }
    let url = $('#FormSubmit').data('url');
    if ($('#name').val() !== null && $('#slug').val() !== null && $('#category').val() !== null && $('#model').val() !== null && $('#buying_price').val() !== null && $('#selling_price').val() !== null && $('#quantity').val() !== null && $('#sku_code').val() !== null && $('#description').val() !== null) {
        $.ajax({
            url: url,
            method: 'POST',
            processData: false,
            contentType: false,
            data: new FormData(this),
            success: function (data) {
                if (data.success_message) {
                    Toast.fire({ icon: 'success', title: data.success_message });
                    $('#FormSubmit')[0].reset();
                    $('#special_box').hide();
                    $('#WarrantyBox').hide();
                    $('.product-gallery').html('');
                    $('.thumbnail').html('');
                } else {
                    ErrorMessageShow(data.error)
                }
            }

        });
    }
});

function ErrorMessageShow(message) {
    $.each(message, function (key, value) {
        toastr['error'](value);
    });
}

/*$('.allcheck').change(function () {
    $('.checkboxChecked').prop("checked", $(this).prop("checked"));
    $('.disabledButton').prop("disabled", $(this).prop("disabled"));
});
$('.checkboxChecked').change(function () {
    if ($(this).prop('checked') === false) {
        $('.allcheck').prop("checked", false);
    }
    if ($('.checkboxChecked:checked').length === $('.checkboxChecked').length) {
        $('.allcheck').prop('checked', true)
        $('.disabledButton').attr('disabled', false)
    }
});*/
$('.disabledButton').attr('disabled', true);


// Onchange Price Update With Ajax Request Submit
$(document).on('change', '#ChangeProductPrice', function () {
    let Price = $(this).val();
    let Id = $(this).data('id');
    let Url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: Url,
        method: 'POST',
        data: { price: Price, id: Id },
        success: function (res) {
            console.log(res)
            $('.loader').hide();
        }
    });
});

// Feature Product Add Request With Ajax Request Send
$(document).on('change', '#featureProd', function () {
    let id = $(this).data('id');
    if (this.checked) {
        var Status = 1;
    } else {
        var Status = 0;
    }
    let Url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: Url,
        method: 'post',
        data: { status: Status, id: id },
        success: function (res) {
            $('.loader').hide();
        }
    });
})

$(document).on('click', '.pagination .page-link', function () {
    event.preventDefault();
    let url = $(this).attr('href');
    let Page = url.split('page=')[1];
    GetData(Page);
});


function GetData(page) {
    $.ajax({
        url: 'product/fetch-data',
        method: 'post',
        data: { page: page },
        success: function (res) {
            $('.dataTableData').html(res);
        }
    });
}


function DeleteItems(route, id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: route,
                method: 'POST',
                success: function (result) {
                    let Page = $('li .page-item.active .page-link').html()
                    GetData(Page);
                    if (!result.message) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        );
                        $('.RemoveRow' + id).empty();

                    } else {
                        Swal.fire(
                            result.type,
                            result.message,
                            'danger'
                        );
                    }

                }
            });
        }
    });
}


$('.allCheck').change(function () {
    $('.checkboxChecked-Items').prop('checked', $(this).prop('checked'));
    if ($('.checkboxChecked-Items:checked').length > 0) {
        $('.disabledButton').attr('disabled', false);
        $('.ActionShowHide').fadeIn();
    } else {
        $('.disabledButton').attr('disabled', true);
        $('.ActionShowHide').fadeOut();
    }
});

$('.checkboxChecked-Items').change(function () {
    if ($(this).prop('checked') == false) {
        $('.allCheck').prop('checked', false);
    } else {
        $('.allCheck').prop('checked', true);
    }
});

$(document).on('click', '.checkboxChecked-Items', function () {
    if ($('.checkboxChecked-Items').length === $('.checkboxChecked-Items:checked').length) {
        $('#allChecked').attr('checked', true);
    } else {
        $('#allChecked').attr('checked', false)
    }
    if ($('.checkboxChecked-Items:checked').length > 0) {
        $('.disabledButton').attr('disabled', false);
        $('.ActionShowHide').fadeIn();
    } else {
        $('.disabledButton').attr('disabled', true);
        $('.ActionShowHide').fadeOut();
    }
});
$('.ActionShowHide').hide();

function submitForm(url) {
    let FormData = $('#SubmitForm').serialize();
    console.log(FormData)
    $.ajax({
        url: url,
        method: "POST",
        data: FormData,
        success: function (res) {
            console.log(res)
            pos3_warning_noti(res)
            GetData();
        }
    });
}

/*$('#SlidersForm').submit(function (e) {
    e.preventDefault();
    let FormDate = [];
    [...this.elements].forEach(el => {
        FormDate[el] = el.val;
    });
    console.log(FormDate);
});*/

function pos3_warning_noti(mess) {
    Lobibox.notify('success', {
        pauseDelayOnHover: true,
        icon: 'bx bx-error',
        continueDelayOnInactiveTab: false,
        position: 'top right',
        size: 'mini',
        msg: mess
    });
}



// Brand Status Change With Ajax Request
$('body').on('change', '#SliderStatus', function () {
    let id = $(this).data('id');
    if (this.checked) {
        var status = 'active';
    } else {
        var status = 'inactive';
    }
    let url = $(this).data('url');
    $('.loader').show();
    $.ajax({
        url: 'sliders/status-slider/' + id + '/' + status,
        method: "POST",
        success: function (result) {
            console.log(result)
            $('.loader').hide();
        }
    });
});
