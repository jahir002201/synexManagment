
@extends('dashboard.layouts.app')
@php
        function startDate($date){
        // Assuming $data->dateRange contains the date string "05/21/2024 - 05/22/2024"
        $dateRange = $date;
        // Explode the date string into an array
        $dates = explode(" - ", $dateRange);
        // Convert the dates into the desired format
        $start_date = DateTime::createFromFormat('m/d/Y', $dates[0])->format('d-M-y');

        return $start_date ;

    }
        function endDate($date){
        // Assuming $data->dateRange contains the date string "05/21/2024 - 05/22/2024"
        $dateRange = $date;
        // Explode the date string into an array
        $dates = explode(" - ", $dateRange);
        // Convert the dates into the desired format

        $end_date = DateTime::createFromFormat('m/d/Y', $dates[1])->format('d-M-y');
        return  $end_date;

    }
@endphp
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

    @forelse ($client->projects as $data )
    <div class="col-xl-4 col-xxl-6 col-lg-6 col-sm-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">{{$data->name}}</h5>
                <a href="{{ route('project.show', $data->id) }}" class=" btn btn-outline-primary " style="font-size: 11px !important;">View </a>
            </div>
            <hr>
            <div class="card-body">
                <h6>Description :</h6>
                <p class="card-text"> {!!$data->description!!}</p>

                <h6>Leader :</h6>
                <p class="card-text">{{$data->leader ? $data->leader->name : 'N/A'}} </p>
                <h6>Members :</h6>
                <p class="card-text">
                    @php
                        $memberIds = explode(',', $data->member_id);
                        $members = App\Models\User::whereIn('id', $memberIds)->get();

                    @endphp
                    @if($members->count() == 0)
                        {{ 'N/A' }}
                    @else
                        @foreach ($members as $member )
                                {{  $member->name }}.
                        @endforeach
                    @endif
                </p>

            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="d-inline-block  ">
                            <h6 class="mb-0">Assigned Date</h6>
                            <p class="badge badge-light text-primary">{{ startDate($data->dateRange)  }}</p>

                        </div>
                        <div class="d-inline-block text-center float-right">
                            <h6 class="mb-0">Deadline</h6>
                            <p class="badge badge-light text-info">{{ endDate($data->dateRange)  }}</p>
                        </div>

                    </div>



            </div>
            </div>
        </div>
    </div>
    @empty

            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header m-auto">
                        <h5 >NO DATA FOUND</h5>
                    </div>
                </div>
            </div>

    @endforelse

</div>

@endsection








