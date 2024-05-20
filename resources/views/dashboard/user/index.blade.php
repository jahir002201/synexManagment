@extends('dashboard.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">All Users</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach ($users as  $data)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="https://ui-avatars.com/api/?name={{ $data->name }}&background=random
                                " class="card-img-top rounded-circle "  style="max-width: 50px; height: 50px; margin-top: 20px;">
                            </td>
                            <td>{{ $data->name }}</td>
                            <td>{{$data->employees ? "Employee ": ''}} </td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm">View</a>

                            </td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
