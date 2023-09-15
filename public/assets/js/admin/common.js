var base_url = window.location.origin + "/";
function get_data(url) {
    $.ajax({
        url: base_url + url,
        type: "get",
        cache: false,
        contentType: false,
        processData: false,

        success: function (result) {
            $("#data_list").html(result);
        },
    });
}

function edit(id, url) {
    $.ajax({
        url: base_url + url,
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            id: id,
        },
        success: function (response) {
            $("#edit_data").html(response);
        },
    });
}

function change_pass(id, url) {
    $.ajax({
        url: base_url + url,
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            id: id,
        },
        success: function (response) {
            $(".change_password").html(response);
        },
    });
}

function action_data(id, table, status, call_back_url) {
    if (status == "delete") {
        var keys = "Deleted";
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/gsqxdxog.json' trigger='loop' colors='primary:#f7b84b,secondary:#f06548' style='width:100px;height:100px'></lord-icon>";
    } else if (status == "Inactive") {
        var keys = "Deactivate";
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/rslnizbt.json' trigger='loop' colors='primary:#f06548,secondary:#f06548' style='width:100px;height:100px'></lord-icon>";
    } else if (status == "Active") {
        var keys = "Activate";
        var icon =
            "<lord-icon src='https://cdn.lordicon.com/hjeefwhm.json' trigger='loop' colors='primary:#08a88a,secondary:#f06548' style='width:100px;height:100px'></lord-icon>";
    }

    Swal.fire({
        html:
            '<div class="mt-3">' +
            icon +
            '<div class="mt-4 pt-2 fs-15 mx-5"><h4>Are you Sure ?</h4><p class="text-muted mx-4 mb-0">Are you Sure You want to ' +
            keys +
            " this Account ?</p></div></div>",
        showCancelButton: true,
        confirmButtonClass: "btn btn-primary w-xs me-2 mb-1",
        confirmButtonText: "Yes, " + keys + " It!",
        cancelButtonClass: "btn btn-danger w-xs mb-1",
        buttonsStyling: false,
        showCloseButton: true,
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url + "common_action/change_status",
                type: "post",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                data: {
                    id: id,
                    keys: keys,
                    table: table,
                },
                success: function (result) {
                    if (result.code == 200) {
                        Swal.fire({
                            position: "top-end",
                            icon: "success",
                            title: result.message,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });
                        get_data(call_back_url);
                    } else {
                        Swal.fire({
                            position: "top-end",
                            icon: "error",
                            title: result.message,
                            showConfirmButton: !1,
                            timer: 1500,
                            showCloseButton: !0,
                        });
                    }
                },
            });
        } else {
            swal("Cancelled", {
                icon: "error",
            });
        }
    });
}

function get_city(id) {
    $.ajax({
        url: base_url + "vendors/get_city",
        type: "post",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: {
            id: id,
        },
        success: function (response) {
            var result = JSON.parse(response);
            $(".state_image").css('display','block');
            $(".city").html(result.output);
        },
        error: function () {
            alert("Fail");
        },
    });
}

function select_change_individual(val) {
    if (val == "Individual") {
        $(".Individual").css("display", "block");
        $("#Individual").html(val);
    } else {
        $(".Individual").css("display", "none");
        $(".Armed").css("display", "none");
    }

    if (val == "Business Entity") {
        $(".business_details").css("display", "block");
    } else {
        $(".business_details").css("display", "none");
        $(".Armed").css("display", "none");
    }
}

function select_change_armed(val) {
    if (val == "Armed Force Dependent") {
        $(".Armed").css("display", "block");
        $("#Armed").html("Armed");
    } else {
        $(".Armed").css("display", "none");
    }
}

function get_del_relation(val) {
    if (val == "Yes") {
        $(".del_list").css("display", "block");
    } else {
        $(".del_list").css("display", "none");
    }

    if (val == "No") {
        $(".del_desc").css("display", "block");
    } else {
        $(".del_desc").css("display", "none");
    }
}

function calculateAge() {
    const dobInput = document.getElementById("dob");
    const ageOutput = document.getElementById("age");

    const dob = new Date(dobInput.value);
    const currentDate = new Date();

    const yearDiff = currentDate.getFullYear() - dob.getFullYear();

    // Adjust the age based on the month and day
    if (
        currentDate.getMonth() < dob.getMonth() ||
        (currentDate.getMonth() === dob.getMonth() &&
            currentDate.getDate() < dob.getDate())
    ) {
        //ageOutput.value = ${yearDiff - 1};
        $("#age").val(yearDiff - 1 + " years");
    } else {
        $("#age").val(yearDiff + " years");
        //ageOutput.value = ${yearDiff};
    }
}

function flexible_time(val)
{
    if(val == 'Flexible Time')
    {
        $('.flex_time').css('display','block');
    }else{
        $('.flex_time').css('display','none');
    }
}

function permission(id) {
    if ($("#write_"+id).is(':checked')) {
          $("#read_"+id).attr("checked", "checked");
          $("#read_"+id).attr("disabled", "disabled");
       }else{
        $("#read_"+id).removeAttr("checked", "checked");
        $("#read_"+id).removeAttr("disabled", "disabled");
       }
   }

   var rowcount = 1;
   $(".rowcount").val(rowcount);

   function add_row_vendor_category() {
       rowcount++;
       $(".rowcount").val(rowcount);

       var html = '<div class="row borderset" id="addnew' + rowcount + '" >';
       html += '<div class="col-lg-5"><div class="mb-3"><label for="image" class="form-label">Image <span class="text-muted" style="font-size: 10px;"><i>(Optional)</i></span></label><input type="file" class="form-control" name="image[]" id="image"/><span id="image_error" class="error"></span></div></div>';
       html += '<div class="col-lg-5"><div class="mb-3"> <label for="name" class="form-label">Name<span class="error">*</span></label> <input type="text" class="form-control" name="name[]" id="name" placeholder="Enter Name" /> <span id="name_error_'+rowcount+'" class="error"></span> </div></div>';
       html += '<div class="col-lg-2"> <button type="button" onclick="removerow_vendor_cat(' + rowcount +');" class="btn btn-primary wave-effect wave-light shadow-none" style="margin-top:28px;">Less</button></div></div></div>';

       $('#addnew').append(html);

   }

   function removerow_vendor_cat(product) {
       $('#addnew' + product).remove();
   }


