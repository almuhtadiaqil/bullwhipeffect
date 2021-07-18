@foreach ($product as $items)
    <div id="edit_product_{{ $items->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('product.update', $items->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group form-line input-group">
                            <label for="product">Product</label>
                            <input type="text" class="form-control" name="product" placeholder="Product Name"
                                value="{{ $items->product }}" required autofocus>
                        </div>
                        <div class="form-group form-line input-group">
                            <label for="">Stock</label>
                            <input type="number" class="form-control" name="" value="{{ $items->stock }}" required
                                readonly>
                        </div>
                        <div class="form-group form-line input-group">
                            <label for="stock">Add Stock</label>
                            <input type="number" class="form-control" name="stock" placeholder="0" required>
                        </div>

                        <div class="form-group form-line input-group">
                            <label for="product_date">Date</label>
                            <input type="date" class="form-control" name="product_date"
                                value="{{ $items->product_date }}" required readonly>
                        </div>
                        <div class="form-group form-line input-group">
                            <div>
                                <label for="product_image">Image</label>
                                <input name="product_image" class="form-control" type="file"
                                    value="{{ $items->product_image }}">
                            </div>
                            <img class="mt-4" src="{{ Storage::url('products/' . $items->product_image) }}"
                                alt="{{ $items->product_image }}" width="70px">
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
