var base_url = window.location.origin + "/";
$(document).on('submit', '#login', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'login',
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
                    $('#error_toast').css('display','block');
                        setTimeout(function() {
                            $('#error_toast').css('display','none');
                        }, 5000);
                        $("#err_resp").text(result.message);
                    window.location.href = base_url + 'dashboard';
                } else if (result.code == 401) {
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                    $(".hide").css('display', 'none');
                    $(".hide").attr('disabled', 'disabled');
                    $(".show").css('display', 'block');
                    
                } else if (result.code == 403) {
                    $("#username_error").text(result.message);
                    $(".hide").css('display', 'none');
                    $(".hide").attr('disabled', 'disabled');
                    $(".show").css('display', 'block');
                    
                } else if (result.code == 402) {
                    $("#password_error").text(result.message);
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
