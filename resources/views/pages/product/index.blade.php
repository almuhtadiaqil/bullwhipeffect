@extends('layout.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA PRODUCT
                    </h2>
                </div>
                <div class="body">

                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    @if (Auth::user()->role !== 'Retailer')
                        <button class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#tambah_product">Add
                            Product</button>
                    @endif
                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Product Brand</th>
                                    <th>Stock</th>
                                    <th>Date</th>
                                    @if (Auth::user()->role != 'Retailer')
                                        <th>Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center"><img width="80px"
                                                src="{{ Storage::url('products/' . $item->product_image) }}"
                                                alt="{{ $item->product }}"></td>
                                        <td>{{ $item->product }}</td>
                                        <td>{{ $item->stock }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->product_date)) }}</td>
                                        @if (Auth::user()->role != 'Retailer')
                                            <td>
                                                <div class="text-center">
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#edit_product_{{ $item->id }}">Update</button>
                                                    <form action="{{ route('product.destroy', $item->id) }}" method="post"
                                                        onsubmit="return confirm('Are You Sure You Want to Delete This Form?')"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.product.addModal')
    @include('pages.product.editModal')
@endsection
