@extends('dashboard.index')
@section('content')
<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5">Create Projects</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Projects</li>
            <li class="breadcrumb-item " ><a class="text-primary">Create Project</a></li>
        </ol>
    </div>

</div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header ">
                   <h4 class="font-weight-bold" > <span style="border-left: 4px solid #593bdb"> </span> &nbsp;Create Project</h4>
                </div>
                <div class=" mt-2 border-bottom"></div>
                <div class="card-body">
                    <form action="">
                        <div class="form-row mb-3">
                            <div class="form-group col-md-4">
                                <label for="" class="form-label font-weight-bold">Project Name :</label>
                                <input type="text" class="form-control" placeholder="Enter Project Name">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="inputPassword4" class="font-weight-bold">Client / Stakeholder :</label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Client Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="" class="form-label font-weight-bold">Timeline :</label>
                                <input class="form-control input-daterange-datepicker" type="text" name="daterange" value="">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold">Project Description :</label>
                            <textarea name="" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                        <div class="form-row mb-3">
                            <div class="form-group  col-lg-6">
                                <label for="inputPassword4" class="font-weight-bold">Status :</label>
                                <select class="form-control form-control-lg">
                                    <option selected>INPROGRESS</option>
                                    <option>ON-HOLD</option>
                                    <option>COMPLETED</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="inputPassword4" class="font-weight-bold">Priority :</label>
                                <select class="form-control form-control-lg">
                                    <option>LOW</option>
                                    <option>MEDIUM</option>
                                    <option>HIGH</option>
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
