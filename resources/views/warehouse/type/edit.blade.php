<form id="edit_warehousetype" method="post">
    @csrf()
    <div id="addnew">
        <div class="row">

            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="w_type" class="form-label">Warehouse Type</label>
                    <input type="text" class="form-control" name="w_type[]"
                        id="w_type" placeholder="Enter Warehouse Type" />
                    <span id="w_type_error" class="error"></span>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="w_unit" class="form-label">Unit (In Sq.Ft)</label>
                    <input type="text" class="form-control" name="w_unit[]"
                        id="w_unit" placeholder="Enter Warehouse Unit" />
                    <span id="w_unit_error" class="error"></span>
                </div>
            </div>
            <input type="hidden" class="rowcount" value="" name="rowcount">
            
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
                Edit
            </button>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->

</form>
