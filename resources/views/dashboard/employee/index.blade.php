@extends('dashboard.index')
@section('style')
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
<style>
    @media (max-width: 576px) {
        #add{
            width: 100%;
        }
    }
</style>

@endsection
@section('content')

<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5">Employees</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item">Employee</li> --}}
            <li class="breadcrumb-item " ><a class="text-primary"> Employee</a></li>
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-12 mb-3">
            <div class="p-3 mb-4 bg-white rounded shadow-sm ">
                <form>
                    <div class="row">
                      <div class="col-lg-4 col-md-6 mb-2">
                        <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Employee</button>

                      </div>
                      <div class="col-lg-3 col-md-2 mb-2">
                        <input type="search" class="form-control" placeholder="Employee Name">
                      </div>
                      <div class="col-lg-3 col-md-2 mb-2">
                        <select class="single-select">
                            <option>Desegination</option>
                            <option>Developer</option>
                            <option>Designer</option>
                            <option>Writer</option>
                          </select>
                      </div>
                      <div class="col-lg-2 col-md-2 mb-2 text-center">
                       <button type="submit" class="btn btn-primary  w-100" style="font-size: 11px;">Search</button>
                      </div>
                    </div>
                  </form>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <a href="{{ route('employee.show', 1) }}">
                    <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text text-muted">Web Designer</p>
                    </div>
                </a>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <a href="{{ route('employee.show', 1) }}">
                    <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                    <div class="card-body text-center">
                        <h5 class="card-title">John Doe</h5>
                        <p class="card-text text-muted">Web Designer</p>
                    </div>
                </a>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
              <div class="card-body text-center">
                <h5 class="card-title">John Doe</h5>
                <p class="card-text text-muted">Web Designer</p>
              </div>
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        <a class="dropdown-item border-bottom py-1" href="#">Edit</a>
                        <a class="dropdown-item py-1" href="#">Delete</a>

                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>


 <!-- Modal -->
 <div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Employee Details</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Full Name :</label>
                            <input type="text" class="form-control" placeholder="Enter  Full Name">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Email :</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Email">
                        </div>
                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Phone :</label>
                            <input type="text" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Start Date :</label>
                          <input type="date" class="form-control" id="inputPassword4" placeholder="Enter Email">
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Department :</label>
                            <select class="single-select">
                                <option>Department</option>
                                <option>Developer</option>
                                <option>Designer</option>
                                <option>Writer</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Designation :</label>
                          <select class="single-select">
                            <option>Desegination</option>
                            <option>Developer</option>
                            <option>Designer</option>
                            <option>Writer</option>
                          </select>
                        </div>

                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Password :</label>
                            <input type="text" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Confirm Password :</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="Confirm  Password">
                        </div>

                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add Employee</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
