<form id="edit_vendor_category" method="post">
    @csrf()
    <div id="addnew">
        <div class="row">

            <div class="col-lg-8">
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" id="image"/>
                    <span id="image_error" class="error"></span>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    <div class="avatar-lg bg-light rounded p-1">
                        <img src="{{asset('upload/vendor_category/'.$vc_data->image)}}" alt="" class="img-fluid d-block" id="product-img">
                    </div>
                </div>
            </div>
            <input type="hidden" id="id" name="id" value="{{$vc_data->id}}">
            <div class="col-lg-12">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name"
                        id="name" placeholder="Enter Name" value="{{$vc_data->name}}" />
                    <span id="name_error" class="error"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 mt-3">
        <div class="hstack gap-2 justify-content-end">
            <button type="button" class="btn btn-soft-danger text-decoration-none fw-medium" data-bs-dismiss="modal" aria-label="Close"><i class="ri-close-line me-1 align-middle"></i>
                Close</button>
            <button type="submit" class="btn btn-primary">
                <i class="ri-save-3-line align-bottom me-1"></i>
                Edit
            </button>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

</form>
