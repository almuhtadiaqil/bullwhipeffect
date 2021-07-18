@foreach ($order as $items)
    <div id="edit_order_{{ $items->id }}" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('order.update', $items->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="retailer_id" value="{{ Auth::user()->id }}">
                        <div class="form-group form-line input-group">
                            <label for="product">Product</label>
                            <select name="product" id="" class="form-control">
                                <option value="{{ $items->product->id }}">{{ $item->product->product }}</option>
                            </select>
                        </div>
                        <div class="form-group form-line input-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $items->quantity }}"
                                required>
                        </div>
                        <div class="form-group form-line input-group">
                            <label for="salesdata">Sales Data/day</label>
                            <input type="number" class="form-control" name="salesdata" value="{{ $items->salesdata }}"
                                required readonly>
                        </div>
                        <div class="form-group form-line input-group">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" placeholder="Bandung"
                                value="{{ $items->location }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endforeach
