@extends('dashboard.layouts.app')
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">App Setting</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item " >App Setting</li>
            {{-- <li class="breadcrumb-item"> <a class="text-primary"> Client Details</a> </li> --}}
        </ol>
    </div>

</div>
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Add or Update Logo </h4>
                </div>
                <div class="card-body">
                   <form action="{{route('dashboard.logoIcon.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold">Icon :</label>
                            <div class="custom-file">
                                <input type="file" name="logoIcon" class="custom-file-input" accept="image/*">
                                <label class="custom-file-label">Upload Image  </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold"> Logo Text :</label>
                            <div class="custom-file">
                                <input type="file" name="logoText" class="custom-file-input" accept="image/*">
                                <label class="custom-file-label">Upload Image  </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary float-right">Save</button>
                        </div>
                   </form>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h5 >Comming Soon...</h5>
                </div>
        </div>
    </div>
    </div>




@endsection
@section('script')
<script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
