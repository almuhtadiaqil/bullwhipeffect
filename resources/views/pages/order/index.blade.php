@extends('layout.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA ORDER
                    </h2>

                </div>
                <div class="body">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    @if (Auth::user()->role == 'Retailer')
                        <button class="btn btn-info btn-sm mb-3" data-toggle="modal"
                            data-target="#tambah_order">Order</button>
                    @endif

                    <br><br>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Order Brand</th>
                                    <th>Amount Order</th>
                                    <th>Sales Data/day</th>
                                    <th>Retail Location</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td class="text-center"><img width="80px"
                                                src="{{ Storage::url('products/' . $item->product->product_image) }}"
                                                alt=""></td>
                                        <td>{{ $item->product->product }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->salesdata }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->order_date)) }}</td>
                                        <td>{{ $item->status_order }}</td>
                                        <td>
                                            @if (Auth::user()->role != 'Retailer')
                                                @if ($item->status_order == 'Approved' && $item->is_ordered == 0)
                                                    <div class="text-center">
                                                        <form action="{{ url('approved', $item->id) }}" method="POST"
                                                            id="approve_form">
                                                            @csrf
                                                            <button class="btn btn-success approve_button"
                                                                id="approve_button">Approve
                                                                Order</button>
                                                        </form>
                                                    </div>
                                                @elseif($item->is_ordered == 1)
                                                    <div class="text-center">
                                                        <i class="material-icons btn-success"
                                                            style="border-radius: 50%">check_circle</i>
                                                    </div>
                                                @endif
                                            @elseif (Auth::user()->role == 'Retailer')
                                                @if ($item->status_order == 'Pending')
                                                    <div class="text-center">
                                                        <button class="btn btn-success" data-toggle="modal"
                                                            data-target="#edit_order_{{ $item->id }}">Update</button>
                                                        <form action="{{ route('order.destroy', $item->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Are You Sure You Want to Delete This Form?')"
                                                            style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                @else
                                                    <div class="text-center">
                                                        <form action="{{ route('order.destroy', $item->id) }}"
                                                            method="post"
                                                            onsubmit="return confirm('Are You Sure You Want to Delete This Form?')"
                                                            style="display: inline">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        @if (Auth::user()->role == 'Retailer')
                            <form action="{{ url('beUpdate') }}" method="post">
                                @csrf
                                <button class="btn btn-primary">Check Bullwhip Effect</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.order.addModal')
    @include('pages.order.editModal')
@endsection
