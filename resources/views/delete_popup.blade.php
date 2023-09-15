<div class="modal fade zoomIn" id="deletepopup" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-soft-info p-3">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" id="deletedata">
                    <input type="hidden" name="id" id="delete_id">
                    <input type="hidden" name="table" id="delete_table">
                    <input type="hidden" name="type" id="delete_type">
                    <input type="hidden" name="call_back_url" id="call_back_url">

                    <div class="mt-2 text-center">
                        <span class="delete_icon"></span>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to <span class="delete_text">Remove</span> this Record ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, <span class="delete_text">Remove</span> It!</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
</div>