@extends('dashboard.layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">

                </div>
                <div class="card-body">
                    <table>
                        <thead>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach ($users as  $data)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="https://ui-avatars.com/api/?name={{ $data->name }}&background=random
                                " class="card-img-top rounded-circle mx-auto d-block"  style="max-width: 150px; margin-top: 20px;">

                            </td>
                            <td>{{ $data->name }}</td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
