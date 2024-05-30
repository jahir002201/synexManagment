@extends('dashboard.layouts.app')

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
        <h3 class="display-5">Clients</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item">Employee</li> --}}
            <li class="breadcrumb-item " ><a class="text-primary"> Clients</a></li>
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-12 mb-3">
            <div class="  mb-4 bg-white rounded shadow-sm" style="padding-top:14px; padding-left: 16px; padding-bottom: 3px;">
                <form action="{{route('searchClient')}}" method="GET">

                    <div class=" row ">
                        <div class="col-lg-4 col-md-4 col-sm-4 mb-2">
                          @if (Auth::user()->can('client.create'))
                          <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Client</button>
                          @endif
                        </div>

                          <div class="col-lg-8 col-md-8 col-sm-8 float-right d-flex justify-content-end align-items-center">
                              <div class=" mb-2 mr-3 src">
                                  <input type="search" name="name" class="form-control " placeholder="Clent Name">
                              </div>

                              <div class=" mb-2 text-center mr-3 ">
                              <button type="submit" class="btn btn-primary   float-right" style="font-size: 11px;">Search</button>
                              </div>
                          </div>

                      </div>

                  </form>
            </div>
        </div>
        @foreach ($clients as $data )
        <div class="col-md-3 mb-4">
            <div class="card position-relative">
                @if($data->image == null)
                    <img src="https://ui-avatars.com/api/?name={{$data->name}}&background=random" class="card-img-top rounded-circle mx-auto d-block" alt="" style="max-width: 150px; margin-top: 20px;">
                @else
                    <img src="{{ asset('uploads/client') }}/{{$data->image}}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                @endif
                <div class="card-body text-center">
                    <h5 class="card-title">{{$data->name}}</h5>
                    @if (Auth::user()->can('client.profile'))
                        <a class="btn btn-outline-dark " style="font-size: 11px;" href="{{ route('client.show', $data->id) }}">View Profile</a>
                        @endif
                    </div>
            @if (Auth::user()->can('client.edit') || Auth::user()->can('client.delete'))
              <div class=" position-absolute top-0 end-0  me-3" style="right:0;">
                <div class="dropdown custom-dropdown">
                    <div data-toggle="dropdown">
                        <a href="" class="btn"><i class="fa fa-ellipsis-v"></i></a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right" style="min-width: 113px;">
                        @if(Auth::user()->can('client.edit'))
                        <a class="dropdown-item border-bottom py-1" href="{{ route('client.edit', $data->id) }}">Edit</a>
                        @endif
                        @if (Auth::user()->can('client.delete'))
                        <form id="desigDeleteForm" action="{{route('client.destroy',$data->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item py-1" >Delete </button>
                        </form>
                        @endif

                    </div>
                </div>
              </div>
              @endif
            </div>
        </div>
        @endforeach


    </div>


 <!-- Modal -->
 <div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Client Details</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('client.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row mb-3">
                        <div class="form-group col-md-12">
                            <label for="" class="form-label font-weight-bold">Name <span class="text-danger">*</span> </label>
                            <input type="text" name="name" class="form-control" placeholder="Enter  Full Name" required>
                        </div>

                    </div>
                    <div class="form-row mb-3">
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Phone <span class="text-danger">*</span></label>
                            <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="font-weight-bold">Email </label>
                            <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Enter Email">
                          </div>
                    </div>


                   <div class="mb-3">
                        <label for="" class="form-label font-weight-bold">Image <span  style="font-size: 9px; color: #ffa9a9;">150 x 150</span> </label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" accept="image/*">
                            <label class="custom-file-label">Upload Image  </label>
                        </div>
                   </div>
                   <div class="mb-3">
                        <label for="" class="form-label font-weight-bold">Address </label>
                        <textarea class="form-control" name="address" id="" cols="30" rows="5" placeholder="Enter Address"></textarea>
                   </div>



            </div>
            <div class="modal-footer">
                <button type="submit" class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add Client</button>
            </div>
        </form>
        </div>
    </div>
</div>

@endsection
@section('script')
<script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
