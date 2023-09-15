@include('includes/header')
<script>
    get_data('vendor_category/list');
</script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Vendor Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Vendor Management</a>
                                </li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div>
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row g-4">
                                    <div class="col-sm">
                                        <div class="d-flex justify-content-sm-end">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#add_vcategory">
                                                <i class="ri-add-fill me-1 align-bottom"></i> Add Vendor Category
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div id="data_list"></div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->
                    </div>
                </div>
                <!-- end col -->
            </div>

            <!--end row-->
            <!-- Modal -->
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

            {{-- form Edit --}}
            <div class="modal fade zoomIn" id="edit" tabindex="-1" aria-labelledby="addSellerLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addSellerLabel">Edit Vendor Category</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="edit_data">
                        </div>
                    </div>
                </div>

            </div>
            <!--end modal-->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    

    @include('includes/footer');

    <script>
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
    </script>
