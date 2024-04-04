
@extends('dashboard.index')
@section('content')
<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5">Client Profile</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('client.index') }}">Clients</a></li>
            <li class="breadcrumb-item " ><a class="text-primary"> Profile</a></li>
        </ol>
    </div>

</div>
<!-- row -->
    




<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                    <img src="https://ui-avatars.com/api/?background=random{{ Auth::user()->name }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                    <div class="card-body text-center">
                        <h3 class="card-title">Barry Cuda</h3>
                    </div>

            </div>

            <div class="col-lg-8 col-md-8 col-sm-8  ">
                <div id="" class=" ml-lg-5 ml-md-3">
                    <div class="profile-personal-info mt-4  pt-2  ml-lg-5  ">

                        <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-8"><span>Mitchell C.Shay</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-8"><span>example@examplel.com</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Phone <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-8"><span>+880 18 7513 4030</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4 mb-4">
                                <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-8"><span>Rosemont Avenue Melbourne,
                                    Florida</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection








