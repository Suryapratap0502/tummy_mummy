var base_url = window.location.origin + "/";
$(document).on('submit', '#add_w_type', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'warehouse_type/add',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.code == 200) {

                    Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                    $('#add_w_type').modal('hide');
                    $('#add_w_type')[0].reset();
                    get_data('warehouse_type');

                } else if (result.code == 401) {
                    $('#add_w_type').modal('show');
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                    $(".hide").css('display', 'none');
                    $(".hide").attr('disabled', 'disabled');
                    $(".show").css('display', 'block');
                }
            },
        })
    }
})