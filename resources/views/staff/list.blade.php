@include('includes/header')
<script>
    get_data('staff/list');
</script>
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Staff</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Staff Management</a></li>
                                <li class="breadcrumb-item active">Staff</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="card">
                <div class="card-body">
                    <div class="row g-2">
                        <div class="col-sm-4">
                            <div class="search-box">
                                <input type="text" class="form-control" id="searchMemberList"
                                    placeholder="Search for name...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-sm-auto ms-auto">
                            <div class="list-grid-nav hstack gap-1">
                                <button class="btn btn-primary addMembers-modal" data-bs-toggle="modal"
                                    data-bs-target="#add_staff"><i class="ri-add-fill me-1 align-bottom"></i> Add
                                    Staff</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div>

                        <div id="data_list"></div>
                        <!-- Modal -->
                        <div class="modal fade" id="add_staff" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">

                                    <div class="modal-body">
                                        <form id="add_staff" enctype="multipart/form-data">
                                            @csrf()
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="px-1 pt-1">
                                                        <div
                                                            class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                                            <img src="assets/images/small/img-9.jpg" alt=""
                                                                id="cover-img" class="img-fluid">

                                                            <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="modal-title text-white" id="createMemberLabel">Add New Staff</h5>
                                                                </div>
                                                                <div class="flex-shrink-0">
                                                                    <div class="d-flex gap-3 align-items-center">
                                                                        <button type="button"
                                                                            class="btn-close btn-close-white"
                                                                            id="createMemberBtn-close"
                                                                            data-bs-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center mb-4 mt-n5 pt-2">
                                                        <div class="position-relative d-inline-block">
                                                            <div class="position-absolute bottom-0 end-0">
                                                                <label for="image" class="mb-0" data-bs-toggle="tooltip" data-bs-placement="right" aria-label="Select Staff Image" data-bs-original-title="Select Staff Image">
                                                                    <div class="avatar-xs">
                                                                        <div
                                                                            class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                            <i class="ri-image-fill"></i>
                                                                        </div>
                                                                    </div>
                                                                </label>
                                                                <input class="form-control d-none" value="" name="image" id="image" type="file" accept="image/png, image/gif, image/jpeg">
                                                            </div>
                                                            <div class="avatar-lg">
                                                                <div class="avatar-title bg-light rounded-circle">
                                                                    <img src="assets/images/users/user-dummy-img.jpg"  id="member-img" class="avatar-md rounded-circle h-auto">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                                <div class="row">
                                                    <input type="hidden" name="role" id="role" value="22">
                                                    <div class="col-md-6 col-lg-6 mb-3">
                                                        <label for="name" class="form-label">Name<span class="error_red">*</span></label>
                                                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                                                        <span id="name_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="email" class="form-label">Email<span class="error_red">*</span></label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email">
                                                        <span id="email_error" class="error"></span>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-lg-6 mb-3">
                                                        <label for="password" class="form-label">Password<span class="error_red">*</span></label>
                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                                                        <span id="password_error" class="error"></span>
                                                    </div>
                                                    <div class="col-md-6 col-lg-6 mb-3">
                                                        <label for="contact" class="form-label">Contact<span class="error_red">*</span></label>
                                                        <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter Contact">
                                                        <span id="contact_error" class="error"></span>
                                                    </div>
                                                </div>
                                                
                                                    <div class="mb-3">
                                                        <label for="designation" class="form-label">Designation<span class="error_red">*</span></label>
                                                        <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation">
                                                        <span id="designation_error" class="error"></span>
                                                    </div>
                                                    
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <button type="button" class="btn btn-soft-danger text-decoration-none fw-medium" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary" id="addNewMember">Add Staff</button>
                                                        <button class="btn btn-primary btn-load hide">
                                                            <span class="d-flex align-items-center">
                                                                <span class="flex-grow-1 me-2">
                                                                    Loading...
                                                                </span>
                                                                <span class="spinner-border flex-shrink-0" role="status">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                </span>
                                                            </span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>
                        <!--end modal-->


                        <div class="modal fade" id="edit" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">

                                    <div class="modal-body" id="edit_data">
                                        
                                    </div>
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>

                        <div class="modal fade" id="change_password" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addSellerLabel">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body change_password">
                                    </div>
                                    <!--end row-->
            
                                    
                                        
                                    </div>
                                </div>
                                <!--end modal-content-->
                            </div>
                            <!--end modal-dialog-->
                        </div>

                        {{-- set priviliges --}}
                        


                        <div class="offcanvas offcanvas-end border-0 side_details" tabindex="-1" id="member-overview">
                            
                        </div>
                        <!--end offcanvas-->
                    </div>
                </div><!-- end col -->
            </div>
            <!--end row-->
        </div><!-- container-fluid -->
    </div><!-- End Page-content -->

    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <script>
                        document.write(new Date().getFullYear())
                    </script>2023 © Velzon.
                </div>
                <div class="col-sm-6">
                    <div class="text-sm-end d-none d-sm-block">
                        Design &amp; Develop by Themesbrand
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>



@include('includes/footer');
