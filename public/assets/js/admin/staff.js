var base_url = window.location.origin + "/";
$(document).on('submit', '#add_staff', function (ev) {
    

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    
    if (error == false) {
        $.ajax({
            url: base_url + 'staff/add',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                $(".hide").css('display', 'block');
                $(".hide").attr('disabled', 'disabled');
                $(".show").css('display', 'none');
            },
            success: function (result) {
                if (result.code == 200) {

                    Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                    $('#add_staff').modal('hide');
                    $('#add_staff')[0].reset();
                    get_data('staff/list');

                } else if (result.code == 401) {
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                    $(".hide").css('display', 'none');
                    $(".hide").attr('disabled', 'disabled');
                    $(".show").css('display', 'block');
                }
            },
            error: function (xhr) {
                $(".submitbtn").css('display', 'block');
            },
            complete: function () {
                $(".submitbtn").css('display', 'block');
            },
        })
    }
})


$(document).on('submit', '#edit_staff', function (ev) {
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'staff/update',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        beforeSend: function () {
            $(".hide").css('display', 'block');
            $(".hide").attr('disabled', 'disabled');
            $(".show").css('display', 'none');
        },
        success: function (result) {
            if (result.code == 200) {
                Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                $('#edit').modal('hide');
                $('#edit_staff')[0].reset();
                get_data('staff/list');

            } else if (result.code == 400) {
                $('#edit').modal('show');
                Swal.fire({ position: "top-end", icon: "error", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    })
})

// change password


$(document).on('submit', '#staff_change_password', function (ev) {
    ev.preventDefault();
    $.ajax({
        url: base_url + 'staff/update_pass',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        beforeSend: function () {
            $(".hide").css('display', 'block');
            $(".hide").attr('disabled', 'disabled');
            $(".show").css('display', 'none');
        },
        success: function (result) {
            if (result.code == 200) {
                Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                $('#change_password').modal('hide');
                $('#staff_change_password')[0].reset();
                get_data('staff/list');

            } else if (result.code == 400) {
                $('#change_password').modal('show');
                Swal.fire({ position: "top-end", icon: "error", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    })
})

function open_staff_details(id)
{
    $.ajax({
        url: base_url + 'staff/side',
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function (response) {

            $('#member-overview').html(response);
        }
    })
}





