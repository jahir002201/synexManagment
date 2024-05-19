@extends('dashboard.index')
@section('style')
<link href="{{asset('dashboard_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link rel="stylesheet" href="{{asset('dashboard_assets/vendor/select2/css/select2.min.css')}}">
@endsection
@section('content')

<div class="row ">
    <div class="col-lg-6 col-md-5 col-sm-5">
        <h3 class="display-5">Expenses</h3>
    </div>
    <div class="col-lg-6 col-md-7 col-sm-7">
        <ol class="breadcrumb " style="float:inline-end; background-color: transparent;">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item">Expenses</li>
            {{-- <li class="breadcrumb-item " ><a class="text-primary">Project List</a></li> --}}
        </ol>
    </div>

</div>
    <div class="row mb-5">
        <div class="col-lg-12 mb-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Expenses List</h4>

                        <button type="button" id="add" class=" btn btn-outline-primary " data-toggle="modal" data-target="#createModal" style="font-size: 11px !important;">Add Expenses</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Purchased By</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($expenses as $data )
                                    <tr class="text-dark">
                                        <td >{{ $data->type }}</td>
                                        <td>{{ $data->purchase_by }}</td>
                                        <td>{{ $data->amount }}</td>
                                        <td>{{ \Carbon\Carbon::parse($data->date)->format('d-m-y') }}</td>
                                        <td>{{ $data->date ? \Carbon\Carbon::parse($data->date)->format('d-m-y') : 'NO-DATA' }}</td>
                                        <td>
                                            <a href="{{ route('project.show', 1) }}" class=" btn btn-primary btn-sm   ">
                                                <i class="fa fa-eye "></i>
                                            </a>
                                            <a href="" class=" btn btn-danger btn-sm   ">
                                                <i class="fa fa-trash "></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty

                                @endforelse
                                {{-- <tr>
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
                                </tr> --}}
                            </tbody>

                        </table>
                    </div>
                </div>
        </div>
    </div>

     <!-- Modal -->
 <div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Expenses</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('expenses.store') }}" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="" class="form-label font-weight-bold">Expenses Type <span class="text-danger">*</span>  </label>
                            <input type="text" name="type" class="form-control" placeholder="Salary, Software Purchase, Tools, Others">
                        </div>
                        {{-- <div class="form-group col-md-6">
                          <label for="inputPassword4" class="font-weight-bold">Email :</label>
                          <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Email">
                        </div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-weight-bold">Employee</label>
                        <select name="employee" class="single-select">
                            <option>NONE</option>
                            @foreach ($employees as $id => $name  )
                                <option value="{{ $id }}">{{$name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-row ">
                        <div class="form-group col-md-6">
                            <label for="inputPassword4" class="font-weight-bold">Purchase Date</label>
                            <input type="date" name="date" class="form-control" id="inputPassword4" >
                          </div>
                        <div class="form-group col-md-6">
                            <label for="" class="form-label font-weight-bold">Purchased By <span class="text-danger">*</span></label>
                            <input type="text" name="purchased_by" class="form-control" placeholder="Name">
                        </div>

                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-weight-bold">Ammount <span class="text-danger">*</span></label>
                        <input type="number" name="amount" class="form-control " min="0" placeholder="৳">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label font-weight-bold">Note</label>
                       <textarea  name="note" id="" class="form-control "  placeholder="Description" cols="30" rows="5"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn  btn-outline-primary float-right" style="font-size: 11px;">Add Expenses</button>
                </div>
            </form>
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
