
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
                @if ($client->image == null)
                <img src="https://ui-avatars.com/api/?name={{$client->name}}&background=random" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                @else
                <img src="{{ asset('uploads/client') }}/{{ $client->image }}" class="card-img-top rounded-circle mx-auto d-block" alt="John Doe" style="max-width: 150px; margin-top: 20px;">
                @endif
                    <div class="card-body text-center">
                        <h3 class="card-title">{{ $client->name }}</h3>
                    </div>

            </div>

            <div class="col-lg-8 col-md-8 col-sm-8  ">
                <div id="" class=" ml-lg-5 ml-md-3">
                    <div class="profile-personal-info mt-4  pt-2  ml-lg-5  ">

                        {{-- <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Name <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-8"><span>Mitchell C.Shay</span>
                            </div>
                        </div> --}}
                        <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                </h5>
                            </div>
                            <div class="col-8"><span>{{$client->email}}</span>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-4">
                                <h5 class="f-w-500">Phone <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-8"><span>{{$client->phone}}</span>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-4 mb-4">
                                <h5 class="f-w-500">Address <span class="pull-right">:</span></h5>
                            </div>
                            <div class="col-8"><span>{{$client->address}}</span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card-header mb-2">
    <h4 class="font-weight-bold" > <span style="border-left: 4px solid #593bdb"> </span> &nbsp; Projects</h4>
 </div>
<div class="row">
    <div class="col-xl-12 col-xxl-12 col-lg-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Project Name 1</h5>
            </div>
            <hr>
            <div class="card-body">
                <h6>Description :</h6>
                <p class="card-text">He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff <br> sections. The bedding was hardly able to cover it and seemed ready to
                    slide off any moment.
                </p>
               <div class="row">
                <div class="col-lg-6">
                    <h6>Leader :</h6>
                    <p class="card-text">Imran  </p>

                </div>
                <div class="col-lg-6">
                    <h6>Members :</h6>
                    <p class="card-text">Esmail,Imran,Jobayer,Jahir,Tamim</p>
                </div>
               </div>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="d-inline-block  ">
                            <h6 class="mb-0">Assigned Date</h6>
                            <p class="badge badge-light text-primary">12,April 2024 </p>
                        </div>
                        <div class="d-inline-block text-center float-right">
                            <h6 class="mb-0">Deadline</h6>
                            <p class="badge badge-light text-info">12,April 2024 </p>
                        </div>

                    </div>



            </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Project Name 2</h5>
            </div>
            <hr>
            <div class="card-body">
                <h6>Description :</h6>
                <p class="card-text">He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff <br> sections. The bedding was hardly able to cover it and seemed ready to
                    slide off any moment.
                </p>
                <h6>Leader :</h6>
                <p class="card-text">He lay on his  </p>
                <h6>Members :</h6>
                <p class="card-text">joe, doe, hib  </p>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="d-inline-block  ">
                            <h6 class="mb-0">Assigned Date</h6>
                            <p class="badge badge-light text-primary">12,April 2024 </p>
                        </div>
                        <div class="d-inline-block text-center float-right">
                            <h6 class="mb-0">Deadline</h6>
                            <p class="badge badge-light text-info">12,April 2024 </p>
                        </div>

                    </div>



            </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Project Name</h5>
            </div>
            <hr>
            <div class="card-body">
                <h6>Description :</h6>
                <p class="card-text">He lay on his armour-like back, and if he lifted his head a little he could see his brown belly, slightly domed and divided by arches into stiff <br> sections. The bedding was hardly able to cover it and seemed ready to
                    slide off any moment.
                </p>
                <h6>Leader :</h6>
                <p class="card-text">He lay on his  </p>
                <h6>Members :</h6>
                <p class="card-text">joe, doe, hib  </p>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="d-inline-block  ">
                            <h6 class="mb-0">Assigned Date</h6>
                            <p class="badge badge-light text-primary">12,April 2024 </p>
                        </div>
                        <div class="d-inline-block text-center float-right">
                            <h6 class="mb-0">Deadline</h6>
                            <p class="badge badge-light text-info">12,April 2024 </p>
                        </div>

                    </div>



            </div>
            </div>
        </div>
    </div>

</div>

@endsection








