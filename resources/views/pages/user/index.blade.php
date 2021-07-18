@extends('layout.master')
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>
                        DATA USER
                    </h2>

                </div>
                <div class="body">
                    <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                    <button class="btn btn-info btn-sm mb-3" data-toggle="modal" data-target="#tambah_user">Add
                        User</button>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>No.Handphone</th>
                                    <th>Username</th>
                                    <th>User</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    @if ($item->role != 'Admin')
                                        <tr>
                                            <td>{{ $loop->iteration }}}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->role }}</td>
                                            <td>
                                                <img src="{{ Storage::url('public/user/' . $item->foto) }}" width="50"
                                                    heigth="50" alt="{{ $item->username }}">
                                            </td>
                                            <td>
                                                <div class="text-center">
                                                    <button class="btn btn-success" data-toggle="modal"
                                                        data-target="#edit_user_{{ $item->id }}">Update</button>
                                                    <form action="{{ route('dashboard.destroy', $item->id) }}"
                                                        method="post"
                                                        onsubmit="return confirm('Are You Sure You Want to Delete This Form?')"
                                                        style="display: inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('pages.user.addModal')
    @include('pages.user.editModal')
@endsection
