@extends('dashboard.index')
@section('style')
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
<style>
    @media (max-width: 576px) {
        #add{
            width: 96%;
        }
        .src{
            width: 100%;
        }
    }
</style>

@endsection
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">Employees</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item">Employee</li> --}}
            <li class="breadcrumb-item " ><a class="text-primary"> Employee</a></li>
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-12 mb-3">
            <div class=" mb-4 bg-white rounded shadow-sm " style="padding-top:14px; padding-left: 16px; padding-bottom: 3px;">
                <form action="{{route('searchEmployee')}}" method="GET" >
                    <div class="row">
                      <div class="col-lg-4 col-md-4 col-sm-4 mb-2">
                        <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Employee</button>

                      </div>

                        <div class="col-lg-8 col-md-8 col-sm-8 float-right d-flex justify-content-end align-items-center">
                            <div class=" mb-2 mr-3 src">
                                <input type="search" name="name" class="form-control " placeholder="Employee Name">
                            </div>

                            <div class=" mb-2 text-center mr-3">
                            <button type="submit" class="btn btn-primary   float-right" style="font-size: 11px;">Search</button>
                            </div>
                        </div>

                    </div>
                </form>
            </div>
        </div>

    @foreach ($users as $data )
      @if ($data->employees)
      <div class="col-md-3 mb-4">
        <div class="card position-relative">
            <a href="{{ route('employee.show', $data->id) }}">
                @if ( $data->employees->image == null)
                <img src="https://ui-avatars.com/api/?name={{$data->name}}&background=random" class="card-img-top rounded-circle mx-auto d-block" alt="" style="max-width: 150px; margin-top: 20px;">
                @else
                <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{$data->name}} </h5>
                    <p class="card-text text-muted">{{$data->employees->designations->designation}}</p>
                </div>
            </a>
          <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
            <div class="dropdown custom-dropdown">
                <div data-toggle="dropdown">
                    <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                </div>
                <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                    {{-- <a class="dropdown-item border-bottom py-1" href="#">Edit</a> --}}
                    <form id="desigDeleteForm" action="{{route('employee.destroy',$data->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="dropdown-item py-1" >Delete</button>
                    </form>

                </div>
            </div>
          </div>
        </div>
    </div>
      @endif
    @endforeach


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
                <form action="{{route('employee.store')}}" method="POST">
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
                            <label for="" class="form-label font-weight-bold">Phone :</label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Start Date :</label>
                          <input type="date" name="start_date" class="form-control" id="inputPassword4" placeholder="Enter Email">
                        </div>
                    </div>

                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Department :</label>
                            <select name="department" id="department" class="single-select">
                                <option value="">SELECT DEPARTMENT</option>
                                @foreach ($departments as $data )
                                    <option value="{{$data->id}}">{{$data->department}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="font-weight-bold">Designation :</label>
                            <select name="designation" id="designation" class="single-select">
                                <option value="">Designation</option>
                                <option value="Developer">Developer</option>
                                <option value="Designer">Designer</option>
                                <option value="Writer">Writer</option>
                            </select>
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
                        <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add Employee</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#department').change(function(){
            var departmentId = $(this).val();
            if(departmentId){
                $.ajax({
                    type:"GET",
                    url:"/get-designations/"+departmentId,
                    success:function(res){
                        if(res){
                            $("#designation").empty();
                            $.each(res,function(key,value){
                                $("#designation").append('<option value="'+value.id+'">'+value.designation+'</option>');
                            });
                        }else{
                            $("#designation").empty();
                        }
                    }
                });
            }else{
                $("#designation").empty();
            }
        });
    });
</script>
<script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
