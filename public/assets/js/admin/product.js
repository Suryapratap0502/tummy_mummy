var base_url = window.location.origin + "/";

$(document).on('submit', '#add_product', function (ev) {
    $('.error').html('');
    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    var pan = $('#pan').val();
    var business_pan = $('#business_pan').val();
    var udyog_aadhar = $('#udyog_aadhar').val();
    var aadhar = $('#aadhar').val();
    if(business_pan != '' && pan != '' && business_pan == pan)
    {
        $('#business_pan_error').html('Must be Differ from Vendor PAN');
        $('#pan_error').html('Must be Differ from Business PAN');
        error = true;
    }
    if(udyog_aadhar !='' && aadhar !='' &&  udyog_aadhar == aadhar)
    {
        $('#aadhar_error').html('Must be Differ from Udyog Aadhar');
        $('#udyog_aadhar_error').html('Must be Differ from Vendor Aadhar');
        error = true;
    }
    if (error == false) {
        $.ajax({
            url: base_url + 'vendors/add',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.code == 200) {

                    Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                    window.location.href = base_url+'vendors';
                    get_data('vendors/list');

                } else if (result.code == 401) {
                    $.each(result.message, function (prefix, val) {
                        $('#' + prefix + '_error').text(val[0]);
                    });
                }
            },
        })
    }
})
