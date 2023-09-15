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
</style>
<div class="main-content">
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Add Warehouse</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Warehouse Management</a>
                            </li>
                            <li class="breadcrumb-item active">Add Warehouse</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_vendor" autocomplete="off">
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
                                    <label class="form-label" for="is_del_access">Is Delivery Partner Access ?</label>
                                    <select name="is_del_access" id="is_del_access" class="form-control">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>       
                                    </select>
                                    <span id="is_del_access_error" class="error"></span>
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
                            <h5 class="card-title mb-0">Warehouse Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="warehouse_type">Warehouse Type<span class="error_lable">*</span></label>
                                    <select name="warehouse_type" id="warehouse_type" class="form-control">
                                       <option value="" selected>Select</option>  
                                       <option value="Two Wheeler">Large Warehouse Unit (1,500-5,000 Sq. Ft.)</option>
                                    </select>
                                    <span id="warehouse_type_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="warehouse_name">Warehouse Name<span class="error_lable">*</span></label>
                                    <input type="text" name="warehouse_name" id="warehouse_name" class="form-control" placeholder="Enter Warehouse Name">
                                    <span id="warehouse_name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="warehouse_contact_no">Warehouse Contact No.<span class="error_lable">*</span></label>
                                    <input type="text" name="warehouse_contact_no" id="warehouse_contact_no" class="form-control" placeholder="Enter Warehouse Contact No.">
                                    <span id="warehouse_contact_no_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="facilities">Facilities Available<span class="error_lable">*</span></label>
                                    <input type="text" name="facilities[]" id="facilities" class="form-control" placeholder="Enter Available Facilities">
                                    <span id="facilities_error" class="error"></span>
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
                                    <label class="form-label" for="pin">Pin<span class="error_lable">*</span></label>
                                    <input type="number" name="pin" id="pin" class="form-control" placeholder="Enter Pin" min="6" max="6">
                                    <span id="pin_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="address">Address<span class="error_lable">*</span></label>
                                    <textarea type="text" name="address" class="form-control" id="address"></textarea>
                                    <span id="address_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="warehouse_lat">Warehouse Latitude<span class="error_lable">*</span></label>
                                    <input type="text" name="warehouse_lat" id="warehouse_lat" class="form-control" placeholder="Enter Warehouse Latitude">
                                    <span id="warehouse_lat_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="warehouse_long">Warehouse Longitude<span class="error_lable">*</span></label>
                                    <input type="text" name="warehouse_long" id="warehouse_long" class="form-control" placeholder="Enter Warehouse Longitude">
                                    <span id="warehouse_long_error" class="error"></span>
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

