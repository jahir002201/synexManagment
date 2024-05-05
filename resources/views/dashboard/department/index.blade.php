@extends('dashboard.index')
@section('style')
<link href="{{asset('dashboard_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
@endsection
@section('content')
<div class="row ">
    <div class="col-lg-6">
        <h3 class="display-5">Depatment And Designation</h3>
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            {{-- <li class="breadcrumb-item">Employee</li> --}}
            <li class="breadcrumb-item " ><a class="text-primary"> Departments</a></li>
        </ol>
    </div>

</div>
<!-- row -->


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Deparments</h4>
                <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Department</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th class="text-dark">#</th>
                                <th class="text-dark">Department Name</th>
                                <th class="text-dark">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Designations</h4>
                <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal2" style="font-size: 11px !important;">Add Designation</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example2" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Designation </th>
                                <th>Department</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modals --}}
<div class="modal fade" id="createModal">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Department</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Department Name :</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
            </div>
        </div>
    </div>
</div>
{{-- designation modal --}}
<div class="modal fade" id="createModal2">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Designation</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="">
                    <div class="form-group ">
                        <label for="" class="form-label font-weight-bold">Department :</label>
                        <select class="single-select">
                            <option>Department</option>
                            <option>Developer</option>
                            <option>Designer</option>
                            <option>Writer</option>
                        </select>
                    </div>
                    <div class="">
                        <label for="" class="form-label font-weight-bold">Designation Name :</label>
                        <input type="text" class="form-control" placeholder="">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add </button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <!-- Datatable -->
    <script src="{{asset('dashboard_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
