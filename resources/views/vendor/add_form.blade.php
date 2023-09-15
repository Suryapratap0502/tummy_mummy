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
.business_details{
    display: none;
}
.del_list{
    display: none;
}
.del_desc{
    display: none;
}
.state_image{
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
                    <h4 class="mb-sm-0">Add Vendor</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Vendor Management</a>
                            </li>
                            <li class="breadcrumb-item active">Add Vendor</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form id="add_vendor" method="post" autocomplete="off">
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
                                    <label class="form-label" for="vendor_type">Vendor Type<span class="error_lable">*</span></label>
                                    <select class="form-control" name="vendor_type" id="vendor_type" onchange="select_change_individual(this.value);">
                                        <option value="" selected>Select</option>
                                        <option value="Individual">Individual</option>
                                        <option value="Business Entity">Business Entity </option>
                                    </select>
                                    <span id="vendor_type_error" class="error"></span>
                                </div>

                                <div class=" col-md-3 mb-3 Individual">
                                    <label class="form-label" for="in_type">Vendor Type in <span id="Individual"></span><span class="error_lable">*</span></label>
                                    <select class="form-control" name="in_type" id="in_type" onchange="select_change_armed(this.value);">
                                        <option value="" selected>Select</option>
                                        <option value="General">General </option>
                                        <option value="Armed Force Dependent">Armed Force Dependent</option>
                                        <option value="Senior Citizen">Senior Citizen</option>
                                    </select>
                                    <span id="in_type_error" class="error"></span>
                                </div>

                                <div class=" col-md-3 mb-3 Armed">
                                    <label class="form-label" for="arm_type">Vendor Type in <span id="Armed"></span><span class="error_lable">*</span></label>
                                    <select class="form-control" name="arm_type" id="arm_type">
                                        <option value="" selected>Select</option>
                                        <option value="Army">Army </option>
                                        <option value="Navy">Navy</option>
                                        <option value="Airforce">Airforce</option>
                                    </select>
                                    <span id="in_type_error" class="error"></span>
                                </div>
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
                                    <label class="form-label d-flex justify-content-between align-items-center" for="category"><div>Category<span class="error_lable">*</span></div><button type="button" class="btn btn-soft-primary btn-sm shadow-none flex-shrink-0" data-bs-toggle="modal"
                                        data-bs-target="#add_vcategory"><i class="ri-add-fill me-1 align-bottom"></i>Add New</button></label>
                                    <select class="form-control js-example-basic-multiple" multiple="multiple" name="category[]" id="category"  >
                                        <option></option>
                                        @if(!empty($category))
                                        @foreach($category as $cat_val)
                                        <option value="{{$cat_val->id}}">{{$cat_val->name}}</option>
                                        @endforeach
                                        @endif
                                    </select>
                                    <span id="category_error" class="error"></span>
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

                                <div class="col-md-3 mb-3 state_image">
                                    <label class="form-label" for="image">State Picture<span class="error_lable">*</span></label>
                                    <input type="file" name="state_image" id="state_image" class="form-control">
                                    <span id="state_image_error" class="error"></span>
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
                                

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="gstin">GSTIN<span class="error_lable">*</span></label>
                                    <input type="text" name="gstin" id="gstin" class="form-control" placeholder="Enter GSTIN">
                                    <span id="gstin_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="is_approved_fssai">Category approved by FSSAI?<span class="error_lable">*</span></label>
                                    <select name="is_approved_fssai" id="is_approved_fssai" class="form-control" onchange="get_approval_fssai(this.value)">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>
                                       <option value="Pending For Approval">Pending For Approval</option>       
                                    </select>
                                    <span id="is_approved_fssai_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 fssai">
                                    <label class="form-label" for="fssai_docs">Upload Approved Docs<span class="error_lable">*</span></label>
                                    <input type="file" name="fssai_docs" id="fssai_docs" class="form-control">
                                    <span id="fssai_docs_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 fssai" >
                                    <label class="form-label" for="fssai_reg_no">FSSAI Registraion No.<span class="error_lable">*</span></label>
                                    <input type="text" name="fssai_reg_no" id="fssai_reg_no" class="form-control" placeholder="Enter FSSAI Registraion No.">
                                    <span id="fssai_reg_no_error" class="error"></span>
                                </div>

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
                                    <label class="form-label" for="is_del_part">Do You Have Delivery Partner?</label>
                                    <select name="is_del_part" id="is_del_part" class="form-control" onchange="get_del_relation(this.value)">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>       
                                    </select>
                                </div>

                                <div class="col-md-3 mb-3 del_list">
                                    <label class="form-label" for="del_part">Select Your Delivery Partner</label>
                                    <select name="del_part" id="del_part" class="form-control">
                                    <option value="" selected>Select</option>
                                    </select>
                                    <span id="del_part_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 del_desc">
                                    <label class="form-label" for="del_desc">If you want to Delivery partner,Enter Description</label>
                                    <textarea type="text" name="del_desc" id="del_desc" placeholder="Delivery Partner Description" class="form-control"></textarea>
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
                            <h5 class="card-title mb-0">Business Entity Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="business_type">Business Type<span class="error_lable">*</span></label>
                                    <select name="business_type" id="business_type" class="form-control" onchange="other_business_type(this.value)">
                                       <option value="" selected>Select</option>  
                                       <option value="Proprietor">Proprietor</option>
                                       <option value="Partnership Firm">Partnership Firm<option>
                                        <option value="Cooperative Society">Cooperative Society</option>
                                        <option value="Self Help Group">Self Help Group</option>
                                        <option value="Joint Liability Group">Joint Liability Group</option>
                                        <option value="Association">Association</option>
                                        <option value="Union">Union</option>
                                        <option value="Other">Others (please Specify)</option>
                                    </select>
                                    <span id="business_type_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3 other_business_type">
                                    <label class="form-label" for="other_bus_type">Other Business Type<span class="error_lable">*</span></label>
                                    <input type="text" name="other_bus_type" id="other_bus_type" class="form-control" placeholder="Enter Other Business Type">
                                    <span id="other_bus_type_error" class="error"></span>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="entity_name">Name Of Business<span class="error_lable">*</span></label>
                                    <input type="text" name="entity_name" id="entity_name" class="form-control" placeholder="Enter Name of Business">
                                    <span id="entity_name_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="establishment">Year of Foundation/ Establishment<span class="error_lable">*</span></label>
                                    <input type="text" name="establishment" id="establishment" class="form-control" placeholder="Enter Establishment Year" min="4" max="4">
                                    <span id="establishment_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="reg_year">Year of Registration<span class="error_lable">*</span></label>
                                    <input type="text" name="reg_year" id="reg_year" class="form-control" placeholder="Enter Year of Registration" min="4" max="4">
                                    <span id="reg_year_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="reg_number">Business Registration No<span class="error_lable">*</span></label>
                                    <input type="text" name="reg_number" id="reg_number" class="form-control" placeholder="Enter Entity Registration No">
                                    <span id="reg_number_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="office_addr">Address of Office<span class="error_lable">*</span></label>
                                    <textarea type="text" name="office_addr" class="form-control" id="office_addr" placeholder="Enter Office Address"></textarea>
                                    <span id="office_addr_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="entity_email">Business Email<span class="error_lable">*</span></label>
                                    <input type="email" name="entity_email" id="entity_email" class="form-control" placeholder="Enter Business Email">
                                    <span id="entity_email_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="business_pan">Business PAN<span class="error_lable">*</span></label>
                                    <input type="text" name="business_pan" id="business_pan" class="form-control" placeholder="Enter Business PAN">
                                    <span id="business_pan_error" class="error"></span>
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="udyog_aadhar">Udyog Aadhar No.</label>
                                    <input type="text" name="udyog_aadhar" id="udyog_aadhar" class="form-control" placeholder="Enter Udyog Aadhar Card Number">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="website">Website (if Any)</label>
                                    <input type="url" name="website" id="website" class="form-control" placeholder="Enter Website URL">
                                </div>

                                <div class="col-md-3 mb-3">
                                    <label class="form-label" for="exp_imp">Are You Exporting / Importing ?</label>
                                    <select name="exp_imp" id="exp_imp" class="form-control">
                                       <option value="" selected>Select</option>  
                                       <option value="Yes">Yes</option>
                                       <option value="No">No</option>       
                                    </select>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="form-label" for="business_desc">Brief Summary About the organisation</label>
                                    <textarea type="text" name="business_desc" id="business_desc" placeholder="Brief Summary About the organisation" class="form-control"></textarea>
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
                        <input type="submit" class="btn btn-primary w-sm" value="Submit" name="submit">
                    </div>
                </div>
               
            </div>
            <!-- end row -->

        </form>

    </div>
    <!-- container-fluid -->
</div>
</div>

<div class="modal fade zoomIn" id="add_vcategory" tabindex="-1" aria-labelledby="addSellerLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Add Vendor Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form id="add_vendor_category" method="post">
                                @csrf()
                                <div id="addnew">
                                    <div class="row">

                                        <div class="col-lg-5">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image <span class="text-muted" style="font-size: 10px;"><i>(optional)</i></span></label>
                                                <input type="file" class="form-control" name="image[]" id="image"/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name<span class="error">*</span></label>
                                                <input type="text" class="form-control" name="name[]"
                                                    id="name" placeholder="Enter Name" />
                                                <span id="name_error_0" class="error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="rowcount" value="" name="rowcount">
                                        <div class="col-lg-2">

                                            <button type="button" onclick="add_row_vendor_category();"
                                                class="btn btn-primary wave-effect wave-light shadow-none"
                                                style="margin-top:28px;">
                                                Add
                                            </button>

                                        </div>
                                        <!--end col-->

                                        <!--end col-->
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="hstack gap-2 justify-content-end">
                                        <button type="button" class="btn btn-soft-danger text-decoration-none fw-medium" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line me-1 align-middle"></i>
                                            Close</button>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-save-3-line align-bottom me-1"></i>
                                            Save
                                        </button>
                                    </div>
                                </div>
                                <!--end col-->
                        </div>
                        <!--end row-->

                        </form>


                    </div>
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