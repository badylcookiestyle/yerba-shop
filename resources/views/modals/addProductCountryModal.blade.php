<!-- Modal -->
<div class="modal fade" id="addCountryModal" tabindex="-1" aria-labelledby="addCountryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCountryLabel">So here u can add new country</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="product-country-errors" class="alert alert-danger" role="alert">
                </div>
                <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="add-product-country-text" class="form-label">Country</label>
                        <input type="text" class="form-control" id="add-product-country-text"  >
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="add-country-btn" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>
