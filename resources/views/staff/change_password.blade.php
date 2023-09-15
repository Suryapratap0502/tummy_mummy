<form id="staff_change_password" method="post">
    @csrf()
    <div id="addnew">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="n_password" class="form-label">New Password<span class="error_red">*</span></label>
                    <input type="password" class="form-control" name="n_password"
                        id="n_password" placeholder="Enter New Password" />
                    <span id="n_password_error" class="error"></span>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="c_password" class="form-label">Confirm Password<span class="error_red">*</span></label>
                    <input type="password" class="form-control" name="c_password"
                        id="c_password" placeholder="Enter Confirm Password" />
                    <span id="c_password_error" class="error"></span>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="{{$id}}">
            <!--end col-->
        </div>
    </div>
    <div class="hstack gap-2 justify-content-end">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Change Password</button>
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
    <!--end col-->
</form> 