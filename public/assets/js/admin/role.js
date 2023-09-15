var base_url = window.location.origin + "/";
$(document).on('submit', '#add_role', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    var role_name = $('#role_name').val();
    if (role_name == '') {
        $('#role_name_error').html('Enter Role Name');
        error = true;
    }
    if (error == false) {
        $.ajax({
            url: base_url + 'role/add',
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
                    $('#add_role_model').modal('hide');
                    $('#add_role')[0].reset();
                    get_data('role/list');

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


function edit(id, url) {
    $.ajax({
        url: base_url + url,
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id
        },
        success: function (response) {

            $('#edit_data').html(response);
        }
    })
}

$(document).on('submit', '#edit_role', function (ev) {
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'role/update',
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
                $('#edit').modal('toggle');
                $('#edit_role')[0].reset();
                get_data('role/list');

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
