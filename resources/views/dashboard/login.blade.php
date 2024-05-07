
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Project Management</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="{{asset('dashboard_assets/css/style.css')}}" rel="stylesheet">

<style>
    .body{
        position: relative;
        margin: 0;
    padding: 0;
    background-image: url('{{ asset('dashboard_assets/images/login.jpg') }}');
    background-size: cover;
    background-position: center;
    }
    .auth-form {
  width: 400px; /* Adjust the width as desired */
  height: auto; /* Adjust the height as desired */


}
.row.no-gutters {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh; /* Set the height to the full viewport height */
}
.auth-form {
  position: absolute;
  top: 50%; /* Position the box vertically centered */
  left: 180%; /* Position the box horizontally centered */
  transform: translate(-50%, -50%); /* Adjust for centering */
  /* Add other styles for the blue box */
}
@media (max-width: 768px) {
  /* CSS rules for smaller screens */
  .auth-form {
    width: 100%; /* Adjust width as needed */
    left: 50%; /* Reset to center horizontally */
    top: -153px;
    transform: translateX(-50%);
  }
}

</style>
</head>

<body class="h-100 body" >
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="">
                        <div class="row no-gutters">
                            <div class="col-xl-5">
                                <div class="auth-form border rounded shadow-sm">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group">
                                            <label><strong>Email</strong></label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        {{-- <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div> --}}
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    {{-- <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('dashboard_assets/vendor/global/global.min.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/quixnav-init.js')}}"></script>
    <script src="{{asset('dashboard_assets/js/custom.min.js')}}"></script>

</body>
</html>
