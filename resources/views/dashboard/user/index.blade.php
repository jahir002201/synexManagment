@extends('dashboard.layouts.app')
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">All Users</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a class="text-primary">Users</a></li>
            {{-- <li class="breadcrumb-item " ><a class="text-primary">Project List</a></li> --}}
        </ol>
    </div>

</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employees, Admins, and Managers</h4>
                    <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add </button>
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
