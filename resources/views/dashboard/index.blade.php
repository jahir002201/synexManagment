@extends('dashboard.layouts.app')
@php

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

<link href="{{asset('dashboard_assets/vendor/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
@endsection
@section('content')
{{-- <div class="row page-titles mx-0">
    <div class="col-sm-6 p-md-0">
        <div class="welcome-text">
            <h4>Hi, {{Auth::user()->name}} welcome !</h4>
            <p class="mb-0">Your business dashboard template</p>
        </div>
    </div>


    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">

    </div>
</div> --}}

    <div class="row">


      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Earnings<span class="badge float-right bg-primary text-white">{{ $percentageBudget }}%</span></h5>
            <p class="font-weight-bold" style="font-size: 23px; color: black">৳{{ $current_month_budget }} </p>
            <div class="border-bottom mb-1">  </div>
            <p class="card-text"><span class="text-muted">Previous Month</span> ৳{{ $last_month_budget }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Expenses<span class="badge float-right bg-primary text-white">{{ $percentageAmount }}%</span></h5>
            <p class="font-weight-bold" style="font-size: 23px; color: black">৳{{ $current_month_amount }} </p>
            <div class="border-bottom mb-1">  </div>


            <p class="card-text"><span class="text-muted">Previous Month</span> ৳{{ $last_month_amount }}</p>
          </div>
        </div>
      </div>
      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Profit<span class="badge float-right bg-primary text-white">{{ $percentageProfit }}%</span></h5>
            <p class="font-weight-bold" style="font-size: 23px; color: black">৳{{ $current_profit }} </p>
            <div class="border-bottom mb-1">  </div>
            <p class="card-text"><span class="text-muted">Previous Month</span> ৳{{ $last_profit  }}</p>
          </div>
        </div>
      </div>

      <div class="col-md-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Projects</h5>
            <p class="font-weight-bold" style="font-size: 23px; color: black">{{ $project_count }} </p>

            <div class="border-bottom mb-1">  </div>
            <p class="card-text">Pending Projects <span class="badge bg-primary text-white"> {{ $project_pending }}</span> </p>
          </div>
        </div>
      </div>

      <!-- Add similar divs for Expenses and Profit sections -->
    </div>


 <div class="row">
    <div class="col-lg-5">
        <div class="row">
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block" ">
                            <i class="ti-user text-success border-success"></i>
                        </div>
                        <div class="stat-content d-inline-block" style="margin-left:16px!important;">
                            <div class="stat-text">Employee</div>

                            <div class="stat-digit">{{ $employee }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block" ">
                            <i class="ti-headphone-alt text-warning border-warning"></i>
                        </div>
                        <div class="stat-content d-inline-block" style="margin-left:16px!important;">
                            <div class="stat-text">Client </div>
                            <div class="stat-digit">{{ $client }}</div>
                        </div>
                    </div>
                </div>
           </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="year-calendar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-7">

    <div class="card">
        <div class="card-header">
            <h5>Recent Projects</h5>
            <a href="{{ route('project.create') }}" class=" btn btn-outline-primary " style="font-size: 11px !important;">New </a>
        </div>
        <div class="card-body">
           <div class="table-responsive">
            <table class="table " >
                <thead>
                    <tr class="text-dark">

                        <th>Project Name</th>
                        <th>Leader</th>

                        <th>Deadline</th>

                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $data )
                        <tr>

                            <td>{{ $data->name }}</td>
                            <td><a href="{{ route('employee.show', $data->leader->id)  }}">{{ $data->leader->name  }}</a></td>
                            <td>
                                {{ endDate($data->dateRange) }}
                            </td>

                            <td style="font-size: 10px;">
                                <span class="badge
                                    @if ($data->status == 'INPROGRESS')
                                        badge-secondary
                                    @elseif ($data->status == 'ON-HOLD')
                                        badge-warning
                                    @elseif ($data->status == 'COMPLETED')
                                        badge-success
                                    @endif
                                    ">
                                {{ $data->status }}
                            </span>
                            </td>
                            <td>
                                <a href="{{ route('project.show', $data->id) }}" class="btn btn-outline-primary btn-sm " style="height: 24px">
                                 <span style="font-size: 10px; position: relative; top: -5px">view</span>
                                </a>

                            </td>
                        </tr>
                    @empty
                       <tr>

                           <td colspan="5" class="text-center">No Projects Found</td>

                       </tr>
                    @endforelse


                </tbody>

            </table>
           </div>
        </div>
       </div>
        <div class="row">
             <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block" ">
                            <i class="ti-credit-card text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block" style="margin-left:16px!important;">
                            <div class="stat-text">Total Earnings   </div>
                            <div class="stat-digit">{{ $total_budget }}</div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="col-lg-6 col-sm-6">
                <div class="card">
                    <div class="stat-widget-one card-body">
                        <div class="stat-icon d-inline-block" ">
                            <i class="ti-notepad text-primary border-primary"></i>
                        </div>
                        <div class="stat-content d-inline-block" style="margin-left:16px!important;">
                            <div class="stat-text">Task</div>
                            <div class="stat-digit">{{ $task }}</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

            <!-- /# card -->
    </div>

</div>


{{-- recent projects --}}
<div class="row">
  <div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">All Expense</h4>
            <a href="{{ route('expenses.index') }}" class=" btn btn-outline-primary " style="font-size: 11px !important;">New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table student-data-table m-t-20">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Expense Type</th>
                            <th>Amount</th>
                            <th>Purchased By</th>
                            <th>Email</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($expenses as $data )
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->date)->format('d-M-y') }}
                            </td>
                            <td>
                                {{ $data->type  }}
                            </td>
                            <td>
                                ৳{{ $data->amount }}
                            </td>

                            <td>
                               {{ $data->purchase_by }}
                            </td>
                            <td>
                                10/05/2017
                            </td>
                        </tr>
                        @empty
                            NO DATA FOUND
                        @endforelse



                    </tbody>
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
{{-- <div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Fee Collections and Expenses</h4>
            </div>
            <div class="card-body">
                <div class="ct-bar-chart mt-5"></div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="ct-pie-chart"></div>
            </div>
        </div>
    </div>
</div> --}}
<div class="row">
    {{-- <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Exam Result</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table student-data-table m-t-20">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Grade Point</th>
                                <th>Percent Form</th>
                                <th>Percent Upto</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Class Test</td>
                                <td>Mathmatics</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>Mathmatics</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>English</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>Bangla</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>Mathmatics</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>English</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                            <tr>
                                <td>Class Test</td>
                                <td>Mathmatics</td>
                                <td>
                                    4.00
                                </td>
                                <td>
                                    95.00
                                </td>
                                <td>
                                    100
                                </td>
                                <td>20/04/2017</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-xl-4 col-xxl-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Timeline</h4>
            </div>
            <div class="card-body">
                <div class="widget-timeline">
                    <ul class="timeline">
                        <li>
                            <div class="timeline-badge primary"></div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>10 minutes ago</span>
                                <h6 class="m-t-5">Youtube, a video-sharing website, goes live.</h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge warning">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>20 minutes ago</span>
                                <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge danger">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>30 minutes ago</span>
                                <h6 class="m-t-5">Google acquires Youtube.</h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge success">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>15 minutes ago</span>
                                <h6 class="m-t-5">StumbleUpon is acquired by eBay. </h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge warning">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>20 minutes ago</span>
                                <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge dark">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>20 minutes ago</span>
                                <h6 class="m-t-5">Mashable, a news website and blog, goes live.</h6>
                            </a>
                        </li>

                        <li>
                            <div class="timeline-badge info">
                            </div>
                            <a class="timeline-panel text-muted" href="#">
                                <span>30 minutes ago</span>
                                <h6 class="m-t-5">Google acquires Youtube.</h6>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-xxl-6 col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Notice Board</h4>
            </div>
            <div class="card-body">
                <div class="recent-comment m-t-15">
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/4.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-primary">john doe</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <p class="comment-date">10 min ago</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/2.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-success">Mr. John</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <p class="comment-date">1 hour ago</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/3.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-danger">Mr. John</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <div class="comment-date">Yesterday</div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/4.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-primary">john doe</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <p class="comment-date">10 min ago</p>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/2.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-success">Mr. John</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <p class="comment-date">1 hour ago</p>
                        </div>
                    </div>
                    <div class="media no-border">
                        <div class="media-left">
                            <a href="#"><img class="media-object mr-3" src="./images/avatar/3.png" alt="..."></a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading text-info">Mr. John</h4>
                            <p>Cras sit amet nibh libero, in gravida nulla.</p>
                            <div class="comment-date">Yesterday</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-6 col-lg-6 col-md-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Todo</h4>
            </div>
            <div class="card-body px-0">
                <div class="todo-list">
                    <div class="tdl-holder">
                        <div class="tdl-content widget-todo2 mr-4">
                            <ul id="todo_list">
                                <li><label><input type="checkbox"><i></i><span>Get up</span><a href='#'
                                            class="ti-trash"></a></label></li>
                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                            href='#' class="ti-trash"></a></label></li>
                                <li><label><input type="checkbox"><i></i><span>Don't give up the
                                            fight.</span><a href='#' class="ti-trash"></a></label></li>
                                <li><label><input type="checkbox" checked><i></i><span>Do something
                                            else</span><a href='#' class="ti-trash"></a></label></li>
                                <li><label><input type="checkbox" checked><i></i><span>Stand up</span><a
                                            href='#' class="ti-trash"></a></label></li>
                                <li><label><input type="checkbox"><i></i><span>Don't give up the
                                            fight.</span><a href='#' class="ti-trash"></a></label></li>
                            </ul>
                        </div>
                        <div class="px-4">
                            <input type="text" class="tdl-new form-control" placeholder="Write new item and hit 'Enter'...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- <div class="col-xl-12 col-xxl-6 col-lg-6 col-md-12">
        <div class="row">
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-facebook">
                        <span class="s-icon"><i class="fa fa-facebook"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-linkedin">
                        <span class="s-icon"><i class="fa fa-linkedin"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-googleplus">
                        <span class="s-icon"><i class="fa fa-google-plus"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 col-xxl-6 col-md-6">
                <div class="card">
                    <div class="social-graph-wrapper widget-twitter">
                        <span class="s-icon"><i class="fa fa-twitter"></i></span>
                    </div>
                    <div class="row">
                        <div class="col-6 border-right">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">89</span> k</h4>
                                <p class="m-0">Friends</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="pt-3 pb-3 pl-0 pr-0 text-center">
                                <h4 class="m-1"><span class="counter">119</span> k</h4>
                                <p class="m-0">Followers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
<div class="row">
    {{-- <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="year-calendar"></div>
            </div>
        </div>
        <!-- /# card -->
    </div> --}}
    {{-- <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">All Expense</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table student-data-table m-t-20">
                        <thead>
                            <tr>
                                <th>Expense Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Email</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                <td>
                                    Salary
                                </td>
                                <td>
                                    ৳2000
                                </td>
                                <td>
                                    <span class="badge badge-primary">Paid</span>
                                </td>
                                <td>
                                    edumin@gmail.com
                                </td>
                                <td>
                                    10/05/2017
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    Salary
                                </td>
                                <td>
                                    ৳2000
                                </td>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                                <td>
                                    edumin@gmail.com
                                </td>
                                <td>
                                    10/05/2017
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    Salary
                                </td>
                                <td>
                                    ৳2000
                                </td>
                                <td>
                                    <span class="badge badge-primary">Paid</span>
                                </td>
                                <td>
                                    edumin@gmail.com
                                </td>
                                <td>
                                    10/05/2017
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    Salary
                                </td>
                                <td>
                                    ৳2000
                                </td>
                                <td>
                                    <span class="badge badge-danger">Due</span>
                                </td>
                                <td>
                                    edumin@gmail.com
                                </td>
                                <td>
                                    10/05/2017
                                </td>
                            </tr>
                            <tr>

                                <td>
                                    Salary
                                </td>
                                <td>
                                    ৳2000
                                </td>
                                <td>
                                    <span class="badge badge-primary">Paid</span>
                                </td>
                                <td>
                                    edumin@gmail.com
                                </td>
                                <td>
                                    10/05/2017
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
@section('script')
<script src="{{asset('dashboard_assets/vendor/pg-calendar/js/pignose.calendar.min.js')}}"></script>
<script src="{{asset('dashboard_assets/js/dashboard/dashboard-2.js')}}"></script>
@endsection
