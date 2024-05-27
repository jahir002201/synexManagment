@extends('dashboard.layouts.app')
@section('style')

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
            <li class="breadcrumb-item"><a href="{{ route('expenses.index') }}">Expenses</a></li>
            <li class="breadcrumb-item " ><a class="text-primary">Edit Expenses</a></li>
        </ol>
    </div>

</div>

    <div class="row">
        <div class="col-lg-8 m-auto">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Update Expenses</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('expenses.update',$expenses->id) }}" method="POST">

                        @csrf
                        @method('PUT')
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="" class="form-label font-weight-bold">Expenses Type <span class="text-danger">*</span>  </label>
                                <input type="text" name="type" class="form-control" placeholder="Salary, Software Purchase, Tools, Others" value="{{$expenses->type}}" required>
                            </div>
                            {{-- <div class="form-group col-md-6">
                              <label for="inputPassword4" class="font-weight-bold">Email :</label>
                              <input type="password" class="form-control" id="inputPassword4" placeholder="Enter Email">
                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold">Employee</label>
                            <select name="employee_id" required class="single-select">
                                @if ($expenses->employee_id == null)
                                    <option value="">NONE</option>
                                @endif
                                @foreach ($employees as $id => $name  )
                                    <option {{ $expenses->employee_id == $id ? 'selected' : ''}} value="{{ $id }}">{{$name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-row ">
                            <div class="form-group col-md-6">
                                <label for="inputPassword4" class="font-weight-bold">Purchase Date</label>
                                <input type="date" name="date" class="form-control" id="inputPassword4" value="{{$expenses->date}}" >
                              </div>
                            <div class="form-group col-md-6">
                                <label for="" class="form-label font-weight-bold">Purchased By <span class="text-danger">*</span></label>
                                <input type="text" name="purchased_by" class="form-control" placeholder="Name" required value="{{$expenses->purchase_by}}">
                            </div>

                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold">Ammount <span class="text-danger">*</span></label>
                            <input type="number" name="amount" class="form-control " min="0" placeholder="৳" required value="{{$expenses->amount}}" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label font-weight-bold">Note</label>
                           <textarea  name="note" id="" class="form-control "  placeholder="Description" cols="30" rows="5" > {{$expenses->note}} </textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn  btn-outline-primary float-right" style="font-size: 11px;">Update</button>
                    </div>
                </form>
                </div>
        </div>
    </div>

@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
    <!-- Datatable -->
    <script src="{{asset('dashboard_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/plugins-init/datatables.init.js')}}"></script>
    <script src="{{asset('dashboard_assets/vendor/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/plugins-init/select2-init.js')}}"></script>
@endsection
