@php
    use Illuminate\Support\Facades\DB;
    $categories=DB::select('select * from categories');
@endphp

<!-- Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editLabel">So here u can edit a product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id=""class="modal-body">
                <div id="product-edit-errors"class="alert alert-danger" role="alert"  >

                </div>
                <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="productNameEdit">Name</label>
                            <input type="text" class="form-control" id="productNameEdit" placeholder="Name of the product">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productBrandEdit">Brand</label>
                            <input type="text" class="form-control" id="productBrandEdit" placeholder="Brand of the product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="productOriginEdit">Country of Origin</label>
                            <input type="text" class="form-control" id="productOriginEdit" placeholder="Country of origin">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="productQuantityEdit">Quantity</label>
                            <input type="numeric" class="form-control" id="productQuantityEdit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescriptionEdit" class="col-form-label">Description</label>
                        <textarea class="form-control" id="productDescriptionEdit"></textarea>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="productCategoryEdit">Category</label>
                            <select class="form-select" id="productCategoryEdit" aria-label="Select Category">
                                @foreach($categories as $category )
                                    <option data-cId="{{$category->id}}" value={{$category->name}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productPriceEdit">Price</label>
                            <input type="numeric" class="form-control" id="productPriceEdit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="file">Image</label>
                            <input type="file" name="file" class="form-control-file" id="fileEdit">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="edit-product-btn"class="btn btn-info">Edit</button>
            </div>
        </div>
    </div>
</div>
