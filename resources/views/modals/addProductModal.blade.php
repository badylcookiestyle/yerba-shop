<!-- I know  makiing queries in blades should be illegal!!!!!!!! -->
@php
    use Illuminate\Support\Facades\DB;
    $categories=DB::select('select * from categories')
@endphp

<!-- Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProductLabel">So here u can add new product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="product-errors" class="alert alert-danger" role="alert">
                </div>
                <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="productName">Name</label>
                            <input type="text" class="form-control" id="productName" placeholder="Name of the product">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="productBrand">Brand</label>
                            <input type="text" class="form-control" id="productBrand" placeholder="Brand of the product">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-10">
                            <label for="productOrigin">Country of Origin</label>
                            <input type="text" class="form-control" id="productOrigin" placeholder="Country of origin">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="productQuantity">Quantity</label>
                            <input type="numeric" class="form-control" id="productQuantity">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="productDescription" class="col-form-label">Description</label>
                        <textarea class="form-control" id="productDescription"></textarea>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-4">
                            <label for="productCategory">Category</label>
                            <select class="form-select" id="productCategory" aria-label="Select Category">
                                @foreach($categories as $category )
                                    <option data-cId="{{$category->id}}" value={{$category->name}}>{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="productPrice">Price</label>
                            <input type="numeric" class="form-control" id="productPrice">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="file">Image</label>
                            <input type="file" name="file" class="form-control-file" id="file">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button type="button" id="add-product-btn" class="btn btn-success">Add</button>
            </div>
        </div>
    </div>
</div>
