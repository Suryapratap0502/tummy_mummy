<form id="edit_role" method="post">
    @csrf()
    <div class="row">
        <div class="col-lg-12">
            <div class="mb-3">
                <label for="role_name" class="form-label">Name</label>
                <input type="text" class="form-control" name="role_name" id="role_name" placeholder="Enter Role" value="{{$role_data->name}}" />
                <span id="role_name_error" class="error"></span>
            </div>
        </div>
        <input type="hidden" class="form-control" id="id" name="id" value="{{$role_data->id}}">
    </div>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-soft-danger text-decoration-none fw-medium" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line me-1 align-middle"></i>
                Close</button>
            <button type="submit" class="btn btn-primary show">
                <i class="ri-save-3-line align-bottom me-1"></i>
                Update
            </button>
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
    <!--end col-->
</form>
