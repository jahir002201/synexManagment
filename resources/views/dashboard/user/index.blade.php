@extends('dashboard.layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">

@endsection
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
                    <h4 class="card-title"> Admins, and Managers</h4>
                    @if (Auth::user()->can('user.create'))
                    <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add User</button>
                    @endif
                </div>
                <div class="card-body table-responsive">
                    <table class="table  ">
                        <thead>
                            <th>#</th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                           @foreach ($users as $key =>  $data)
                           <tr>
                            <td>{{ $loop->iteration }}</td>

                            <td>{{ $data->name }}</td>
                           @if ($data->getRoleNames()->isNotEmpty())
                                @foreach ($data->getRoleNames() as $permission)
                                    <td> <span class="badge badge-primary text-white mr-1">{{ $permission }}</span></td>
                                @endforeach

                            @else
                            <td>Member</td>
                           @endif

                            <td>{{ $data->email }}</td>
                            <td>
                                @if ($key != 0)
                                    @if (Auth::user()->can('user.delete'))
                                    <a href="{{route('user.delete',$data->id)}}" class="btn btn-danger btn-sm"> <i class="fa fa-trash "></i></a>
                                    @endif
                                @else
                                <span class="btn btn-dark btn-sm text-white"> <i class="fa fa-trash "></i></span>
                                @endif
                            </td>
                        </tr>
                           @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            @if (Auth::user()->can('role.assign'))
            <div class="card">
                <div class="card-header">
                    <h4>Assign Role</h4>
                    <a href="{{ route('role.index') }}" class=" btn btn-outline-primary " style="font-size: 11px !important;">Create Role </a>
                </div>
                <div class="card-body">
                    <form action="{{route('roleAssign.store')}}" method="post">
                        @csrf
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <select name="user_id" class="single-select" id="">
                                    <option value="">Select User</option>
                                    @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group col-md-6">
                                <select name="role_id" class="single-select" id="">
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                    <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button type="submit" class="btn btn-sm btn-primary float-right">Assign</button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
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
                                <input type="text" name="name" class="form-control" placeholder="Enter  Full Name" required value="{{old('name')}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4" class="font-weight-bold">Email :</label>
                              <input type="email" name="email" class="form-control"  placeholder="Enter Email" required value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label font-weight-bold">Password :</label>
                                <input type="text" name="password" class="form-control" placeholder="Enter Password" required value="{{old('password')}}">
                            </div>
                            <div class="form-group col-md-6">
                              <label for="inputPassword4" class="font-weight-bold">Confirm Password :</label>
                              <input type="password" name="password_confirmation" class="form-control" id="inputPassword4" placeholder="Confirm  Password" required>
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
@section('script')
<script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
