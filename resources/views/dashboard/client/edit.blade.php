@extends('dashboard.index')
@section('style')
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">


@endsection
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">Clients</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " ><a href="{{ route('client.index') }}" > Clients</a></li>
            <li class="breadcrumb-item"> <a class="text-primary"> Client Details</a> </li>
        </ol>
    </div>

</div>
    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Details</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('client.update',$client->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-row mb-3">
                            <div class="form-group col-md-12">
                                <label for="" class="form-label font-weight-bold">Name <span class="text-danger">*</span> </label>
                                <input type="text" name="name" class="form-control" placeholder="Enter  Full Name" required value="{{ $client->name }}">
                            </div>

                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group col-md-6">
                                <label for="" class="form-label font-weight-bold">Phone <span class="text-danger">*</span></label>
                                <input type="number" name="phone" class="form-control" placeholder="Enter Contact Number" required value="{{ $client->phone }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="font-weight-bold">Email </label>
                                <input type="email" name="email" class="form-control" id="inputPassword4" placeholder="Enter Email" value="{{ $client->email }}">
                              </div>
                        </div>

                       <div class="mb-3 ">
                            <label for="" class="form-label font-weight-bold">Address </label>
                            <textarea class="form-control" name="address" id="" cols="30" rows="5" placeholder="Enter Address"> {{ $client->address }} </textarea>
                       </div>

                       <label for="" class="form-label font-weight-bold">Image <span  style="font-size: 9px; color: #ffa9a9;">150 x 150</span> </label>
                       <div class=" form-row">
                            <div class="form-group col-md-8">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" accept="image/*" onchange="document.getElementById('preview').src = window.URL.createObjectURL(this.files[0])">

                                    <label class="custom-file-label">Upload Image  </label>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                @if ($client->image)
                                <img src="{{ asset('uploads/client') }}/{{ $client->image }}" style="height: 60px; width: 60px;" alt="">
                                @endif
                                <img id="preview"  style="height: 60px; width: 60px;"/>
                            </div>
                        </div>



                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-outline-primary float-right" style="font-size: 11px;">Update</button>
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
