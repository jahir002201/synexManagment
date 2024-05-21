@extends('dashboard.index')
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
@section('style')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
<style>
    .btn-outline-primary{
       background-color: #e3daff !important;
        border: 0 !important;
        font-size: 15px;
    }
    .btn-outline-primary:hover{
       background-color: #6b51df !important;
    }
    @media (max-width: 576px) {
        .between{
            justify-content: space-between !important;
        }
    }
    @media (min-width: 577px) and (max-width: 768px) {
        .between{
            justify-content: space-between !important;
        }
    }
    @media (min-width: 767px) {
        .between{
            justify-content: space-around !important;
        }
    }
</style>

@endsection
@section('content')
<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5"> Project Overview</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('project.index')}}">Projects</a></li>
            <li class="breadcrumb-item " ><a class="text-primary"> Project Overview</a></li>
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-9 mb-5">
            <div class="card ">
                <div class="card-header ">
                   <h6 class="font-weight-bold mb-0" > <span style="border-left: 4px solid #593bdb"> </span> &nbsp; Project Details</h6>
                   <a href="{{ route('project.create') }}" class=" btn btn-outline-primary  " style="font-size: 11px !important;">Create Project</a>

                </div>
                <div class=" mt-2 border-bottom"></div>
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex ml-3">
                            <i class="fa fa-circle text-info  m-auto " style="font-size:9px;"></i>
                            <h4 class="ml-2 mb-0">{{$project->name}}</h4>
                        </div>
                    </div>
                    <div class="row mt-4  ml-1">
                        <h6 class="" style="margin-top: 2px; margin-right: 3px">Client : </h6> <a href="{{route('client.show',$project->client_id)}}" class="" style="margin-bottom: 0.5rem;"> {{ $project->client->name}}</a>
                    </div>
                    <div class="row mt-1 ml-1">
                        <h6 class="">Project Description:</h6>
                    </div>
                    <p class="ml-1">

                        {!!$project->description!!}
                    </p>
                    <hr>

                    <div class="row">

                            <div class=" between col-lg-4 col-md-4 col-sm-4 d-flex ">
                                <div class="d-inline-block  ">
                                    <p class="mb-0">Leader</p>
                                    <h6>
                                        <a class="text-dark" href="{{route('employee.show',$project->leader_id)}}" >{{$project->leader->name}}</a>
                                    </h6>
                                </div>
                                <div class="float-right ">
                                    <p class="mb-0">Start Date</p>
                                <h6 class="">{{startDate($project->dateRange)}}</h6>
                                </div>
                            </div>
                            <div class=" between col-lg-4 col-md-4 col-sm-4 d-flex ">
                                <div class="d-inline-block ">
                                    <p class="mb-0">End Date</p>
                                    <h6>{{endDate($project->dateRange)}}</h6>
                                </div>
                                <div class="float-right ">
                                    <p class="mb-0">Members</p>
                                <h6 class="ml-4">
                                    {{$memberCount >= 5 ? '5+' : $memberCount}}
                                </h6>
                                </div>
                            </div>
                            <div class=" between col-lg-4  col-md-4 col-sm-4 d-flex ">
                                <div class="d-inline-block ">
                                    <p class="mb-0">Status</p>
                                    <p class="badge badge-light text-warning"> {{$project->status}} </p>
                                </div>
                                <div class="float-right ">
                                    <p class="mb-0">Priority</p>
                                    <p class="badge badge-light text-info"> {{$project->priority}} </p>
                                </div>
                            </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card ">
                <div class="card-header ">
                   <h6 class="font-weight-bold" > <span style="border-left: 4px solid #593bdb"> </span> &nbsp; Project Members</h6>

                </div>
                <div class=" mt-2 border-bottom"></div>
                <div class="">
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">Name</p>
                        <p class="text-dark pb-0 mb-0">Designation</p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Isamil</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Developer</i></p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Jobayer</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Designer</i></p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Isamil</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Developer</i></p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Jobayer</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Designer</i></p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Isamil</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Developer</i></p>
                    </div>
                    <div class="d-flex justify-content-between pt-3 px-3 border-bottom">
                        <p class=" text-dark">Jobayer</p>
                        <p class="text-dark"><i class="badge badge-outline-success text-success">Designer</i></p>
                    </div>
                </div>
            </div>
            <div class="card ">
                <div class="card-header ">
                   <h6 class="font-weight-bold mb-0" > <span style="border-left: 4px solid #593bdb"> </span> &nbsp; Project Documents</h6>
                   <a class="p-2 bg-primary" style="
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 23%;
                height: 23px;
                width: 39px;
               "><i class="fa fa-plus text-white"></i></a>


                </div>
                <div class=" mt-2 border-bottom"></div>
                <div class="">
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">File.zip</p>
                        <p class="text-dark pb-0 mb-0">
                            <a href="#" class="mr-2 badge badge-light"> <i class="fa fa-download text-primary "></i></a>
                            <a href="#" class="badge badge-light"> <i class="fa fa-trash text-danger"></i></a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">photos.zip</p>
                        <p class="text-dark pb-0 mb-0">
                            <a href="#" class="mr-2 badge badge-light"> <i class="fa fa-download text-primary "></i></a>
                            <a href="#" class="badge badge-light"> <i class="fa fa-trash text-danger"></i></a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">logos.zip</p>
                        <p class="text-dark pb-0 mb-0">
                            <a href="#" class="mr-2 badge badge-light"> <i class="fa fa-download text-primary "></i></a>
                            <a href="#" class="badge badge-light"> <i class="fa fa-trash text-danger"></i></a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">document.txt</p>
                        <p class="text-dark pb-0 mb-0">
                            <a href="#" class="mr-2 badge badge-light"> <i class="fa fa-download text-primary "></i></a>
                            <a href="#" class="badge badge-light"> <i class="fa fa-trash text-danger"></i></a>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between py-2 px-3 border-bottom">
                        <p class=" text-dark pb-0 mb-0">product.rar</p>
                        <p class="text-dark pb-0 mb-0">
                            <a href="#" class="mr-2 badge badge-light"> <i class="fa fa-download text-primary "></i></a>
                            <a href="#" class="badge badge-light"> <i class="fa fa-trash text-danger"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
