<div id="tambah_product" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group form-line input-group">
                        <label for="product">Product</label>
                        <input type="text" class="form-control" name="product" placeholder="Product Name" required
                            autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" name="stock" placeholder="10" required autofocus>
                    </div>
                    <div class="form-group form-line input-group">
                        <div>
                            <label for="product_image">Image</label>
                            <input name="product_image" class="form-control" type="file">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
