<div id="tambah_order" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="retailer_id" value="{{ Auth::user()->id }}">
                    <div class="form-group form-line input-group">
                        <label for="product">Product</label>
                        <select name="product" id="" class="form-control">
                            @foreach ($product as $item)
                                <option value="{{ $item->id }}">{{ $item->product }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="0" required>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="salesdata">Sales Data/day</label>
                        <input type="number" class="form-control" name="salesdata" placeholder="0" required>
                    </div>
                    <div class="form-group form-line input-group">
                        <label for="location">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Bandung" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
