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
                    <h4 class="mb-sm-0">Add Product</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ url('/') }}">Product Management</a>
                            </li>
                            <li class="breadcrumb-item active">Add Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <form action="#" class="form-steps" autocomplete="off">
                        <div class="step-arrow-nav mb-4">

                            <ul class="nav nav-pills custom-nav nav-justified" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="steparrow-gen-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-gen-info" type="button" role="tab" aria-controls="steparrow-gen-info" aria-selected="true">General Info</button>
                                </li>
                                 <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="steparrow-description-info-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-info" type="button" role="tab" aria-controls="steparrow-description-info" aria-selected="false">Variant Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="steparrow-description-seo-tab" data-bs-toggle="pill" data-bs-target="#steparrow-description-seo" type="button" role="tab" aria-controls="steparrow-description-seo" aria-selected="false">SEO Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill" data-bs-target="#pills-experience" type="button" role="tab" aria-controls="pills-experience" aria-selected="false">Finish</button>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="steparrow-gen-info" role="tabpanel" aria-labelledby="steparrow-gen-info-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                            <label class="form-label d-flex justify-content-between align-items-center" for="category"><div>Category<span class="error_lable">*</span></div><button type="button" class="btn btn-soft-primary btn-sm shadow-none flex-shrink-0" data-bs-toggle="modal"
                                                data-bs-target="#request_category"><i class="ri-add-fill me-1 align-bottom"></i>Request New</button></label>
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
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="diet_description">Diet Description<span class="error_lable">*</span></label>
                                                <select name="diet_description" id="diet_description" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <option value="Veg">Veg</option>
                                                    <option value="Non Veg">Non Veg</option>
                                                </select>
                                                <span id="diet_description_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="pro_name">Product Name<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Enter Product Name" required="">
                                                <span id="pro_name_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="pro_image">Product Image<span class="error_lable">*</span></label>
                                                <input type="file" class="form-control" id="pro_image" name="pro_name" placeholder="Enter Product Name" required="">
                                                <span id="pro_image_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="pre_used">Preservatives Used<span class="error_lable">*</span></label>
                                                <select name="pre_used" id="pre_used" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <span id="pre_used_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="storage_req">Storage Requirements<span class="error_lable">*</span></label>
                                                <select name="storage_req" id="storage_req" class="form-control">
                                                    <option value="" selected>Select</option>
                                                    <option value="Yes">Yes</option>
                                                    <option value="No">No</option>
                                                </select>
                                                <span id="storage_req_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="pro_specility">Specialty of the product</label>
                                                <textarea type="text" name="pro_specility" id="pro_specility" class="form-control" placeholder="Enter Specialty of the product"></textarea>
                                                <span id="pro_specility_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="recomended_use">Recommended Use</label>
                                                <textarea type="text" name="recomended_use" id="recomended_use" class="form-control" placeholder="Enter Recommended Use"></textarea>
                                                <span id="recomended_use_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="other_info">Other Info</label>
                                                <textarea type="text" name="other_info" id="other_info" class="form-control" placeholder="Other Info for Delivery, Handling, Packaging etc., to be addressed by T&M"></textarea>
                                                <span id="other_info_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="pro_description">Product Description</label>
                                                <textarea type="text" name="pro_description" id="editor1" class="form-control" placeholder="Description of Product"></textarea>
                                                <span id="pro_description_error" class="error"></span>
                                            </div>
                                        </div>

                                        
                                        
                                    </div>
                                    <div class="alert alert-danger">
                                        <b>Declaration :</b> Merchant will be responsible for the product quality on delivery to Customer. Please be careful in entering shelf life or get it tested at nearest food lab.
                                    </div>
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="steparrow-description-info-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="steparrow-description-info" role="tabpanel" aria-labelledby="steparrow-description-info-tab">
                                <div id="addnew">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_name">Variant Name<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="variant_name" name="variant_name" placeholder="Enter Variant Name" required="">
                                                <span id="variant_name_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="qty">Quantity<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" required="">
                                                <span id="qty_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="exp_price">Expected Price<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="exp_price" name="exp_price" placeholder="Enter Expected Price" required="">
                                                <span id="exp_price_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="final_price">Final Price<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="final_price" name="final_price" placeholder="Enter Final Price" required="">
                                                <span id="final_price_error" class="error"></span>
                                                <span class="error" style="font-size: 10px;"><i>T&M & Merchant Mutually Agreed</i></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="sku_code">SKU Code<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="sku_code" name="sku_code" placeholder="Enter SKU Code" required="">
                                                <span id="sku_code_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_specification">Specification<span class="error_lable">*</span></label>
                                                <textarea type="text" class="form-control" id="variant_specification" name="variant_specification" placeholder="Enter Specification" required=""></textarea>
                                                <span id="variant_specification_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="ingradiants">Ingradiants<span class="error_lable">*</span></label>
                                                <textarea type="text" class="form-control" id="ingradiants" name="ingradiants" placeholder="Enter Ingradiants" required=""></textarea>
                                                <span id="ingradiants_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_length">Length (In cm)<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="variant_length" name="variant_length" placeholder="Enter Specification" required="">
                                                <span id="variant_length_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_width">Width (In cm)<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="variant_width" name="variant_width" placeholder="Enter Specification" required="">
                                                <span id="variant_width_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_height">Height (In cm)<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="variant_height" name="variant_height" placeholder="Enter Specification" required="">
                                                <span id="variant_height_error" class="error"></span>
                                            </div>
                                        </div>
                                        <div class="col-lg-2">
                                            <div class="mb-3">
                                                <label class="form-label" for="variant_weight">Weight (In gm)<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="variant_weight" name="variant_weight" placeholder="Enter Specification" required="">
                                                <span id="variant_weight_error" class="error"></span>
                                            </div>
                                        </div>
                                        <input type="hidden" class="rowcount" value="" name="rowcount">
                                        <div class="col-lg-1 text-end">

                                            <button type="button" onclick="add_row();" class="btn btn-primary wave-effect wave-light shadow-none"
                                                style="margin-top:28px;">
                                                Add
                                            </button>

                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab" data-previous="steparrow-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General Info</button>
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="steparrow-description-seo" role="tabpanel" aria-labelledby="steparrow-description-seo-tab">
                                <div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_title">Meta Title<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" required="">
                                                <span id="meta_title_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_tag">Meta Tags<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" value="tag1, tag2, tag3" id="tag-input" name="meta_tag" placeholder="Enter Meta Tags" required="">
                                                <span id="meta_tag_error" class="error"></span>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label" for="meta_keys">Meta Keywords<span class="error_lable">*</span></label>
                                                <input type="text" class="form-control" id="meta_keys" name="meta_keys" placeholder="Enter Meta Keyword" required="">
                                                <span id="meta_keys_error" class="error"></span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab" data-previous="steparrow-gen-info-tab"><i class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i> Back to General Info</button>
                                    <button type="button" class="btn btn-success btn-label right ms-auto nexttab nexttab" data-nexttab="pills-experience-tab"><i class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next</button>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-experience" role="tabpanel">
                                <div class="text-center">

                                    <div class="avatar-md mt-5 mb-4 mx-auto">
                                        <div class="avatar-title bg-light text-success display-4 rounded-circle">
                                            <i class="ri-checkbox-circle-fill"></i>
                                        </div>
                                    </div>
                                    <h5>Well Done !</h5>
                                    <p class="text-muted">You have Successfully Signed Up</p>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        

    </div>
    <!-- container-fluid -->
</div>
</div>

<div class="modal fade zoomIn" id="request_category" tabindex="-1" aria-labelledby="addSellerLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Request For New Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <form id="request_vendor_category" method="post">
                                @csrf()
                                <div id="addnew_1">
                                    <div class="row">

                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image <span class="text-muted" style="font-size: 10px;"><i>(optional)</i></span></label>
                                                <input type="file" class="form-control" name="image" id="image"/>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Name<span class="error">*</span></label>
                                                <input type="text" class="form-control" name="name"
                                                    id="name" placeholder="Enter Name" />
                                                <span id="name_error_0" class="error"></span>
                                            </div>
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
<script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-multiple').select2({
        placeholder: "Select an option",
    });
});
</script>
<script>
       CKEDITOR.replace('editor1');
        CKEDITOR.replace('editor2');
    
</script>

<script>
     var rowcount = 1;
     $(".rowcount").val(rowcount);

   function add_row() {
    rowcount++;
    $(".rowcount").val(rowcount);
    var html = '<div class="row borderset" id="addnew' + rowcount + '" >';
        html += '<div class="col-lg-6"><div class="mb-3"><label class="form-label" for="meta_title">Meta Title<span class="error_lable">*</span></label><input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" required=""><span id="meta_title_error" class="error"></span></div></div>';
        html += '<div class="col-lg-6"><div class="mb-3"><label class="form-label" for="meta_tag">Meta Tags<span class="error_lable">*</span></label><input type="text" class="form-control" value="tag1, tag2, tag3" id="tag-input" name="meta_tag" placeholder="Enter Meta Tags" required=""><span id="meta_tag_error" class="error"></span></div></div>';
        html += '<div class="col-lg-12"><div class="mb-3"><label class="form-label" for="meta_keys">Meta Keywords<span class="error_lable">*</span></label><input type="text" class="form-control meta_keys" id="meta_keys" name="meta_keys" placeholder="Enter Meta Keyword" required=""><span id="meta_keys_error" class="error"></span></div></div>';
        html += '<div class="col-lg-2"> <button type="button" onclick="removerow(' + rowcount +');" class="btn btn-primary wave-effect wave-light shadow-none" style="margin-top:28px;">Less</button></div></div></div>';
        $('#addnew' + rowcount ).append(html);
   }

   function removerow(product) {
       $('#addnew' + product).remove();
   }
</script>
