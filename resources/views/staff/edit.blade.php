<form id="edit_staff" enctype="multipart/form-data">
    @csrf()
    <div class="row">
        <div class="col-lg-12">
            <div class="px-1 pt-1">
                <div
                    class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                    <img src="assets/images/small/img-9.jpg" alt=""
                        id="cover-img" class="img-fluid">

                    <div
                        class="d-flex position-absolute start-0 end-0 top-0 p-3">
                        <div class="flex-grow-1">
                            <h5 class="modal-title text-white" id="createMemberLabel">Edit Staff</h5>
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
            <input type="hidden" name="id" id="id" value="{{$staff_data->id}}">
            <div class="col-md-6 col-lg-6 mb-3">
                <label for="name" class="form-label">Name<span class="error_red">*</span></label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{$staff_data->name}}">
                <span id="name_error" class="error"></span>
            </div>
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">Email<span class="error_red">*</span></label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" value="{{$staff_data->email}}">
                <span id="email_error" class="error"></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-6 mb-3">
                <label for="contact" class="form-label">Contact<span class="error_red">*</span></label>
                <input type="number" class="form-control" name="contact" id="contact" placeholder="Enter Contact" value="{{$staff_data->contact}}">
                <span id="contact_error" class="error"></span>
            </div>
            <div class="col-md-6 col-lg-6 mb-3">
                <label for="designation" class="form-label">Designation<span class="error_red">*</span></label>
                <input type="text" class="form-control" name="designation" id="designation" placeholder="Enter Designation" value="{{$staff_data->designation}}">
                <span id="designation_error" class="error"></span>
            </div>
        </div>
        
            
            
            <div class="hstack gap-2 justify-content-end">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="addNewMember">Update Staff</button>
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