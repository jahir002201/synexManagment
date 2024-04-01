
@extends('dashboard.index')
@section('content')

 <!-- row -->
 <div class="row">
    <div class="col-lg-12">
        <div class="profile">
            <div class="profile-head">
                <div class="photo-content">
                    <div class="cover-photo"></div>
                    <div class="profile-photo">
                        <img src="{{ asset('dashboard_assets/avatar-02.jpg') }}" class="img-fluid rounded-circle" alt="">
                    </div>
                </div>
                <div class="profile-info">
                    <div class="row justify-content-center">
                        <div class="col-xl-8">
                            <div class="row">
                                <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-name">
                                        <h4 class="text-primary">Mitchell C. Shay</h4>
                                        <p>UX / UI Designer</p>
                                    </div>
                                </div>
                                {{-- <div class="col-xl-4 col-sm-4 border-right-1 prf-col">
                                    <div class="profile-email">
                                        <h4 class="text-muted">hello@email.com</h4>
                                        <p>Email</p>
                                    </div>
                                </div>
                                 <div class="col-xl-4 col-sm-4 prf-col">
                                    <div class="profile-call">
                                        <h4 class="text-muted">(+1) 321-837-1030</h4>
                                        <p>Phone No.</p>
                                    </div>
                                </div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="">
                <div class="profile-tab">
                    <div class="custom-tab-1">
                       <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs ">

                                <li class="nav-item ml-1"><a href="#about-me" data-toggle="tab" class="nav-link">About</a>
                                </li>
                                <li class="nav-item"><a href="#profile-settings" data-toggle="tab" class="nav-link">Setting</a>
                                </li>
                            </ul>
                        </div>
                       </div>
                        <div class="tab-content ">
                            <div id="about-me" class="tab-pane fade   shadow-sm rounded bg-white">
                                <div class="profile-personal-info mt-4  pt-2 pl-4">
                                    <h4 class="text-primary mb-4 pt-4">Personal Information</h4>
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

                            <div id="profile-settings" class="tab-pane fade active show ml-4">
                                <div class="">
                                    <div class="settings-form">
                                        <div class="row">
                                            <div class="col-lg-4 ml-0">
                                                <div class=" shadow-sm rounded bg-white">
                                                        <form action="">
                                                            <label for="" class="form-label">Profile Picture</label>
                                                            <input type="file" name="" id="" class="form-control">
                                                        </form>

                                                </div>
                                            </div>
                                            <div class="col-lg-4">

                                            </div>
                                        </div>
                                        <h4 class="text-primary">Account Setting</h4>
                                        <form>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>Email</label>
                                                    <input type="email" placeholder="Email" class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Password</label>
                                                    <input type="password" placeholder="Password" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" placeholder="1234 Main St" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <input type="text" placeholder="Apartment, studio, or floor" class="form-control">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label>City</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>State</label>
                                                    <select class="form-control" id="inputState">
                                                        <option selected="">Choose...</option>
                                                        <option>Option 1</option>
                                                        <option>Option 2</option>
                                                        <option>Option 3</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Zip</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" id="gridCheck">
                                                    <label for="gridCheck" class="form-check-label">Check me out</label>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary" type="submit">Sign
                                                in</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection








