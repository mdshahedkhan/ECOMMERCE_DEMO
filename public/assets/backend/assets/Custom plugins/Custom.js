tinymce.init({selector: '.editor'});

// Toastr Message Setting
toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-top-right",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut"
}


//SweetAlert Message Global
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
})


$(document).ready(function () {
    //Default data table
    $('#example').DataTable();
    var table = $('#example2').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
    });
    table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


// Brand Status Change
    $('body').on('change', '#BrandStatus', function () {
        let id = $(this).attr('data-id');
        if (this.checked) {
            var Status = 'active';
        } else {
            var Status = 'inactive';
        }
        //Send Ajax Request
        $('.loader').show()
        $.ajax({
            url: 'brand/status/' + id + '/' + Status,
            method: 'get',
            success: function (result) {
                console.log(result);
                $('.loader').hide()
            }
        });
    });


});

$('#special_price').click(function () {
    $('#special_price_box').slideToggle();
});

$('#wYes').change(function () {
    $('#warranty_box').slideDown('show');
});

$('#wNo').change(function () {
    $('#warranty_box').slideUp('show');
});

// Slug Generator Function
function convertToSlug(text, place) {
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

$("body").on('submit', '#product-create', function (event) {
    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    let MyUrls = $('#route').val();
    $.ajax({
        url: MyUrls,
        method: "post",
        contentType: false,
        processData: false,
        data: new FormData(this),
        success: function (result) {
            if ($.isEmptyObject(result.error)) {
                if (result.success) {
                    $('#errorMessage').css('display', 'none')
                    $('#successMessage').css('display', 'block').text(result.success);
                    Toast.fire({
                        icon: 'success',
                        title: result.success
                    })
                    $('#product-create')[0].reset()
                }
            } else {
                showErrorMessage(result.error)
                console.log(result.error)
                $('#successMessage').css('display', 'none');
                toastr.error(result.Error_messages, result.Type)
                $.each(result.error, function (key, value) {
                    toastr.error(value, 'Warning !')
                });
            }
        }
    });
})


function showErrorMessage(data) {
    $('#errorMessage').addClass('alert-danger').css('display', 'block').find('ul').html('');
    $.each(data, function (key, value) {
        $('#errorMessage').find('ul').append('<li>' + value + '</li>');
    })
}



