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
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Employees, Admins, and Managers</h4>
                    <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add </button>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-striped ">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach ($users as  $data)
                           <tr>
                            <td>{{ $loop->iteration }}</td>

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


    <div class="modal fade" id="createModal">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label font-weight-bold">Full Name :</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter  Full Name">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4" class="font-weight-bold">Email :</label>
                              <input type="email" name="email" class="form-control"  placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label font-weight-bold">Password :</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter Password">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4" class="font-weight-bold">Confirm Password :</label>
                              <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Confirm  Password">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
