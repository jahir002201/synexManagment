
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
                                            <div class="col-lg-8  ml-0 pl-0">
                                                <div class="card">
                                                    <div class="card-body">
                                                <h4 class="text-primary mt-2 pt-1 mb-4">Update Personal Informations</h4>
                                                <form class="mt-3">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="" class="form-label font-weight-bold">Full Name :</label>
                                                            <input type="email" placeholder="" class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="" class="form-label font-weight-bold">Phone :</label>
                                                            <input type="email" placeholder="" class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="" class="form-label font-weight-bold">Email :</label>
                                                            <input type="email" placeholder="" class="form-control">
                                                        </div>

                                                    </div>
                                                    <div class="form-group">
                                                        <label for="" class="form-label font-weight-bold" >Address</label>
                                                        <textarea  class="form-control" name=""  id="" cols="30" rows="10"></textarea>
                                                    </div>

                                                    <button  class="btn btn-primary" type="submit">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                            </div>
                                            <div class="col-lg-4">
                                               <div class="card">
                                                    <div class="card-body">
                                                        <form action="">
                                                            <h4 class="text-primary mt-2 pt-1 mb-4">Update Profile Image</h4>
                                                            <div class="input-group mb-3">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input">
                                                                    <label class="custom-file-label">Choose file</label>
                                                                </div>
                                                                <div class="input-group-append">
                                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                               </div>
                                               <div class="card">
                                                    <div class="card-body">
                                                        <form action="">
                                                            <h4 class="text-primary mt-2 pt-1 mb-4">Update Password</h4>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label font-weight-bold">Current Password :</label>
                                                                <input type="text" placeholder="" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label font-weight-bold">New Password :</label>
                                                                <input type="text" placeholder="" class="form-control">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="" class="form-label font-weight-bold">Confirm Password :</label>
                                                                <input type="text" placeholder="" class="form-control">
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">Update</button>
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
            </div>
        </div>
    </div>

</div>
@endsection








