@include('includes/header')
<script>
    get_data('warehouse_management/list');
</script>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Warehouse</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item">
                                    <a href="{{ url('/') }}">Warehouse</a>
                                </li>
                                
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
                                           <a href="{{ url('warehouse_management/add_form') }}"><button class="btn btn-primary">
                                                <i class="ri-add-fill me-1 align-bottom"></i> Add Warehouse
                                            </button> </a>
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

        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    

    @include('includes/footer');

    <script>
        var rowcount = 1;
        $(".rowcount").val(rowcount);

        function add_row() {
            rowcount++;
            $(".rowcount").val(rowcount);

            var html = '<div class="row borderset" id="addnew' + rowcount + '" >';
            html += '<div class="col-lg-4"><div class="mb-3"><label for="image" class="form-label">Image <span class="text-muted" style="font-size: 10px;"><i>(Optional)</i></span></label><input type="file" class="form-control" name="image[]" id="image"/><span id="image_error" class="error"></span></div></div>';
            html += '<div class="col-lg-4"><div class="mb-3"> <label for="name" class="form-label">Name<span class="error">*</span></label> <input type="text" class="form-control" name="name[]" id="name" placeholder="Enter Name" /> <span id="name_error_'+rowcount+'" class="error"></span> </div></div>';
            html += '<div class="col-lg-3"><div class="mb-3"><label for="name" class="form-label">Is FSSAI Required ? <span class="text-muted" style="font-size: 10px;"><i>(By Default No)</i></span></label><select name="fssai_req[]" id="fssai_req" class="form-control"><option value="" selected>Select</option><option value="Yes">Yes</option><option value="No">No</option></select></div></div>';
            html += '<div class="col-lg-1"> <button type="button" onclick="removerow(' + rowcount +');" class="btn btn-primary wave-effect wave-light shadow-none" style="margin-top:28px;">Less</button></div></div></div>';

            $('#addnew').append(html);

        }

        function removerow(product) {
            $('#addnew' + product).remove();
        }
    </script>
