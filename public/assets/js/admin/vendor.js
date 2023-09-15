var base_url = window.location.origin + "/";
$(document).on('submit', '#add_vendor_category', function (ev) {
    $('.error').html('');

    ev.preventDefault(); // Prevent browers default submit.
    var formData = new FormData(this);
    var error = false;
    if (error == false) {
        $.ajax({
            url: base_url + 'vendor_category/add',
            type: 'post',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (result) {
                if (result.code == 200) {

                    Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                    $('#add_vcategory').modal('hide');
                    $('#add_vendor_category')[0].reset();
                    get_data('vendor_category');

                } else if (result.code == 401) {
                    $('#add_vcategory').modal('show');
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


$(document).on('submit', '#edit_vendor_category', function (ev) {
    ev.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        url: base_url + 'vendor_category/update',
        type: 'post',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function (result) {
            if (result.code == 200) {
                Swal.fire({ position: "top-end", icon: "success", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
                $('#edit').modal('toggle');
                $('#edit_vendor_category')[0].reset();
                get_data('vendor_category/list');

            } else if (result.code == 401) {
                $('#edit').modal('show');
                $.each(result.message, function (prefix, val) {
                    $('#' + prefix + '_error').text(val[0]);
                });
                $(".hide").css('display', 'none');
                $(".hide").attr('disabled', 'disabled');
                $(".show").css('display', 'block');
            }
            
            else if (result.code == 400) {
                $('#edit').modal('show');
                Swal.fire({ position: "top-end", icon: "error", title: result.message, showConfirmButton: !1, timer: 1500, showCloseButton: !0 });
            }
        },
        cache: false,
        contentType: false,
        processData: false,
    })
})

function get_approval_fssai(val)
{
    $('.fssai').css('display','none');
    if(val == 'Yes')
    {
        $('.fssai').css('display','block');
    }else{
        $('.fssai').css('display','none');
    }
}

function get_warehouse(val)
{
    $('.warehouse_list').css('display','none');
    if(val == 'Yes')
    {
        $('.warehouse_list').css('display','block');
    }else{
        $('.warehouse_list').css('display','none');
    }
}

function other_business_type(val)
{
    $('.other_business_type').css('display','none');
    if(val == 'Other')
    {
        $('.other_business_type').css('display','block');
    }else{
        $('.other_business_type').css('display','none');
    }
}

$(document).on('submit', '#add_vendor', function (ev) {
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
