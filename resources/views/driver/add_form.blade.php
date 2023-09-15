@include('includes/header');
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
<style>
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #f9f9f9;
    border: 1px solid #cfcfcf;
    border-radius: 4px;
    cursor: default;
    float: left;
    margin-right: 5px;
    margin-top: 5px;
    padding: 0 5px;
    color: #666;
    font-weight: 500;
    text-transform: capitalize;
}
.select2-container .select2-selection--multiple .select2-selection__choice__remove:hover { 
    background: none !important; 
}
.fssai{
    display: none;
}
.warehouse_list{
    display: none;
}
.other_business_type{
    display: none;
}
.Individual{
    display: none;
}
.Armed{
    display: none;
}
.flex_time{
    display: none; 
}
</style>
<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Delivery Vendor</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Vendor Management</a>
                            </li>
                            <li class="breadcrumb-item active">Add Delivery Vendor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_del_vendor" method="post" autocomplete="off">
            @csrf()
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Personal Perticulars</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" id="role" name="role" value="{{$role->id}}">
                                <div class=" col-md-3 mb-3">
                                    <label class="form-label" for="area_type">Area Type<span class="error_lable">*</span></label>
                                    <select class="form-control" name="area_type" id="area_type">
                                        <option value=" selected">Select</option>
                                        @if(!empty($area_type))
                                        @foreach($area_type as $area_val)
                                        <option value="{{$area_val->id}}">{{$area_val->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span id="area_type_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="image">Profile Picture<span class="error_lable">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="name">Name<span class="error_lable">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name">
                                    <span id="name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="email">Email<span class="error_lable">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                                    <span id="email_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="password">Password<span class="error_lable">*</span></label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                                    <span id="password_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="gender">Gender<span class="error_lable">*</span></label>
                                    <select name="gender" id="gender" class="form-control">
                                        <option value="" selected>Select</option>  
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                    <span id="gender_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="dob">Date Of Birth<span class="error_lable">*</span></label>
                                    <input type="date" name="dob" id="dob" class="form-control" onchange="calculateAge();">
                                    <span id="dob_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="age">Age<span class="error_lable">*</span></label>
                                    <input type="text" name="age" id="age" class="form-control" placeholder="Select DOB for age" readonly>
                                    <span id="age_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="contact">Mobile No.<span class="error_lable">*</span></label>
                                    <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Mobile Number">
                                    <span id="contact_error" class="error"></span>
                                </div>


                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="state">State<span class="error_lable">*</span></label>
                                    <select name="state" id="state" class="form-control" onchange="get_city(this.value)">
                                        <option value="" selected>Select</option>
                                        @if(!empty($state))
                                        @foreach($state as $state_val)
                                        <option value="{{$state_val->id}}">{{$state_val->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span id="state_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="city">City<span class="error_lable">*</span></label>
                                    <select name="city" id="city" class="form-control city">
                                            
                                    </select>
                                    <span id="city_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="address">Address<span class="error_lable">*</span></label>
                                    <textarea type="text" name="address" class="form-control" id="address"></textarea>
                                    <span id="address_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="pin">Pin<span class="error_lable">*</span></label>
                                    <input type="number" name="pin" id="pin" class="form-control" placeholder="Enter Pin">
                                    <span id="pin_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="pan">PAN No.<span class="error_lable">*</span></label>
                                    <input type="text" name="pan" id="pan" class="form-control" placeholder="Enter PAN">
                                    <span id="pan_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="pan_docs">Upload PAN <span class="error_lable">*</span></label>
                                    <input type="file" name="pan_docs" id="pan_docs" class="form-control" placeholder="Enter PAN">
                                    <span id="pan_docs_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="aadhar">Aadhar No.<span class="error_lable">*</span></label>
                                    <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="Enter Aadhar Number">
                                    <span id="aadhar_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="aadhar_docs">Upload Aadhar<span class="error_lable">*</span></label>
                                    <input type="file" name="aadhar_docs" id="aadhar_docs" class="form-control">
                                    <span id="aadhar_docs_error" class="error"></span>
                                </div>
                                

                                {{-- <div class="col-md-3 mb-3">
                                    <label class="form-label" for="gstin">GSTIN</label>
                                    <input type="text" name="gstin" id="gstin" class="form-control" placeholder="Enter GSTIN">
                                    <span id="gstin_error" class="error"></span>
                                </div> --}}

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="is_member_warehouse">Memeber of Warehouse ?</label>
                                    <select name="is_member_warehouse" id="is_member_warehouse" class="form-control" onchange="get_warehouse(this.value)">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>       
                                    </select>
                                    <span id="is_member_warehouse_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 warehouse_list">
                                    <label class="form-label" for="warehouse">Select Warehouse<span class="error_lable">*</span></label>
                                    <select name="warehouse" id="warehouse" class="form-control">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>       
                                    </select>
                                    <span id="warehouse_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="vendor_lat">Latitude<span class="error_lable">*</span></label>
                                    <input type="text" name="vendor_lat" id="vendor_lat" class="form-control" placeholder="Enter Vendor Latitude">
                                    <i><a href="https://support.google.com/maps/answer/18539?hl=en&co=GENIE.Platform%3DDesktop" target="_blank">Need Help?</a></i>
                                    <span id="vendor_lat_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="vendor_long">Longitude<span class="error_lable">*</span></label>
                                    <input type="text" name="vendor_long" id="vendor_long" class="form-control" placeholder="Enter Vendor Latitude">
                                    <i><a href="https://support.google.com/maps/answer/18539?hl=en&co=GENIE.Platform%3DDesktop" target="_blank">Need Help?</a></i>
                                    <span id="vendor_long_error" class="error"></span>
                                </div>


                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="vendor_desc">Vendor Description / Background</label>
                                    <textarea type="text" name="vendor_desc" id="vendor_desc" placeholder="Description / Background" class="form-control"></textarea>
                                </div>
                              </div>
                            <div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->

                    <div class="card business_details">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Vehicle & Driving Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="vehicle_type">Vehicle Type<span class="error_lable">*</span></label>
                                    <select name="vehicle_type" id="vehicle_type" class="form-control">
                                       <option value="" selected>Select</option>  
                                       <option value="Two Wheeler">Two Wheeler</option>
                                       <option value="Four Wheeler">Four Wheeler<option>
                                    </select>
                                    <span id="vehicle_type_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="vehicle_no">Vehicle No.<span class="error_lable">*</span></label>
                                    <input type="text" name="vehicle_no" id="vehicle_no" class="form-control" placeholder="Enter Vehicle Number">
                                    <span id="vehicle_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="rc_no">Vehicle RC Number<span class="error_lable">*</span></label>
                                    <input type="text" name="rc_no" id="rc_no" class="form-control" placeholder="Enter Vehicle RC Number">
                                    <span id="rc_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="rc_expiry">Vehicle RC Expiry<span class="error_lable">*</span></label>
                                    <input type="date" name="rc_expiry" id="rc_expiry" class="form-control">
                                    <span id="rc_expiry_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="rc_copy">Upload Vehicle RC Copy<span class="error_lable">*</span></label>
                                    <input type="file" name="rc_copy" id="rc_copy" class="form-control">
                                    <span id="rc_copy_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="dl_no">DL Number<span class="error_lable">*</span></label>
                                    <input type="text" name="dl_no" id="dl_no" class="form-control" placeholder="Enter DL Number">
                                    <span id="dl_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="dl_expiry">DL Expiry<span class="error_lable">*</span></label>
                                    <input type="date" name="dl_expiry" id="dl_expiry" class="form-control">
                                    <span id="dl_expiry_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="dl_copy">Upload DL Copy<span class="error_lable">*</span></label>
                                    <input type="file" name="dl_copy" id="dl_copy" class="form-control">
                                    <span id="dl_copy_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="is_bag_avl">Is Bag Available ?<span class="error_lable">*</span></label>
                                    <select name="is_bag_avl" id="is_bag_avl" class="form-control">
                                        <option value="" selected>Select</option>  
                                        <option value="Flexible Time">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <span id="is_bag_avl_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="sut_time">Delivery suitability<span class="error_lable">*</span></label>
                                    <select name="sut_time" id="sut_time" class="form-control" onchange="flexible_time(this.value)">
                                        <option value="" selected>Select</option>  
                                        <option value="Flexible Time">Flexible Time</option>
                                        <option value="24*7">24*7</option>
                                    </select>
                                    <span id="sut_time_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 flex_time">
                                    <label class="form-label" for="from_time">From Time<span class="error_lable">*</span></label>
                                    <input type="time" name="from_time" id="from_time" class="form-control">
                                    <span id="from_time_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 flex_time">
                                    <label class="form-label" for="to_time">To Time<span class="error_lable">*</span></label>
                                    <input type="time" name="to_time" id="to_time" class="form-control">
                                    <span id="to_time_error" class="error"></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Bank Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="bank_name">Bank Name<span class="error_lable">*</span></label>
                                    <input type="text" name="bank_name" id="bank_name" class="form-control" placeholder="Enter Bank Name">
                                    <span id="bank_name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="branch_name">Branch Name<span class="error_lable">*</span></label>
                                    <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name">
                                    <span id="branch_name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="bank_holder_name">Bank Holder Name<span class="error_lable">*</span></label>
                                    <input type="text" name="bank_holder_name" id="bank_holder_name" class="form-control" placeholder="Enter Bank Holder Name">
                                    <span id="bank_holder_name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="ac_no">Account Number<span class="error_lable">*</span></label>
                                    <input type="text" name="ac_no" id="ac_no" class="form-control" placeholder="Enter Bank A/C Number">
                                    <span id="ac_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="ifsc">IFSC Code<span class="error_lable">*</span></label>
                                    <input type="text" name="ifsc" id="ifsc" class="form-control" placeholder="Enter IFSC Code">
                                    <span id="ifsc_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="upi_id">UPI ID<span class="error_lable">*</span></label>
                                    <input type="text" name="upi_id" id="upi_id" class="form-control" placeholder="Enter UPI Id">
                                    <span id="upi_id_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="micr_no">MICR No.</label>
                                    <input type="text" name="micr_no" id="micr_no" class="form-control" placeholder="Enter MICR Number">
                                    <span id="micr_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="mob_bank">Mobile No linked to Bank<span class="error_lable">*</span></label>
                                    <input type="number" name="mob_bank" id="mob_bank" class="form-control" placeholder="Enter Mobile Number Which is link with bank">
                                    <span id="mob_bank_error" class="error"></span>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- end card -->

                    <!-- end card -->
                    <div class="text-end mb-3">
                        <button type="submit" class="btn btn-primary w-sm">Submit</button>
                    </div>
                </div>
               
            </div>
            <!-- end row -->

        </form>

    </div>
    <!-- container-fluid -->
</div>
</div>
@include('includes/footer');
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select an option",
    });
});
</script>
