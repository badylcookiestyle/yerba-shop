<!-- Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addBrandLabel">So here u can add new brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="product-brand-errors" class="alert alert-danger" role="alert">
                </div>
                <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="add-product-brand-text" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="add-product-brand-text"  >
                    </div>


                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="add-brand-btn" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>
