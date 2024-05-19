@extends('dashboard.index')
@section('style')
<link href="{{asset('dashboard_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">Projects</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Projects</li>
            <li class="breadcrumb-item " ><a class="text-primary">Project List</a></li>
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Project List</h4>

                        <a href="{{ route('project.create') }}" class=" btn btn-outline-primary " style="font-size: 11px !important;">Create Project</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Project Name</th>
                                    <th>Leader</th>

                                    <th>Deadline</th>
                                    <th>Priority</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Synex Management</td>
                                    <td>Imran</td>
                                    <td>5 April</td>
                                    <td>Low</td>
                                    <td>On-Going</td>
                                    <td>
                                        <a href="{{ route('project.show', 1) }}" class=" btn btn-primary btn-sm   ">
                                            <i class="fa fa-eye "></i>
                                        </a>
                                        <a href="" class=" btn btn-danger btn-sm   ">
                                            <i class="fa fa-trash "></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
        </div>
    </div>
@endsection

@section('script')

    <!-- Datatable -->
    <script src="{{asset('dashboard_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection
