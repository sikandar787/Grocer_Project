<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sabzi Express | Login Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" />
    <style>
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }
    
    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
    }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1><b>Sabzi Express</b></h1>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                
                <div class="alert alert-success" id="successAuth" style="display: none;"></div>
                <div class="alert alert-danger" id="error" style="display: none;"></div>
                @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session()->get('message') }}
                </div>
                @endif
                @if(session()->has('message1'))
                <div class="alert alert-danger">
                    {{ session()->get('message1') }}
                </div>
                @endif
                <form method="POST" action="{{ route('login.custom') }}">
                    @csrf
                    @if($errors->first('email'))
                    <div class="alert alert-danger">
                        {{$errors->first('email')}}
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if($errors->first('phone_number'))
                    <div class="alert alert-danger">
                        {{$errors->first('phone_number')}}
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="number" name="phone_number" id="number" class="form-control" placeholder="Phone No.">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                        <div id="recaptcha-container"></div>
                    </div>
                    @if($errors->first('password'))
                    <div class="alert alert-danger">
                        {{$errors->first('password')}}
                    </div>
                    @endif
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> -->
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="button" onclick="phoneAuth()" class="btn btn-success btn-block">Send OTP</button>
                        </div>
                        <!-- /.col -->
                    </div>
                    <br>
                    <div class="alert alert-success" id="successOtpAuth" style="display: none;"></div>
                    <div class="input-group mb-3">
                        <input type="number" id="verificationCode" class="form-control" placeholder="Enter Verification Code">
                        <button type="button" onclick="codeverify()" class="btn btn-info">Verify Code</button>
                    </div>
                    <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                </form>

                <!-- <div class="social-auth-links text-center mt-2 mb-3">
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> -->
                <!-- /.social-auth-links -->

                <!-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> -->
                {{-- <p class="mt-3 text-center">
                    <!-- <a href="{{url('custom-registration')}}" class="text-center">Register a new membership</a> --> --}}
                </p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
        <!--Firebase SDK-->
        
        <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-app.js"></script>
    
    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <!--<script src="https://www.gstatic.com/firebasejs/8.7.1/firebase-analytics.js"></script>-->
    <script src="https://www.gstatic.com/firebasejs/8.1.0/firebase-auth.js"></script>
    
    <script>
    
      // Your web app's Firebase configuration
      // For Firebase JS SDK v7.20.0 and later, measurementId is optional
      var firebaseConfig = {
        apiKey: "AIzaSyD8dPLSi0sFfDa-vPzR6to1LClgTkaozLA",
        authDomain: "sabziexpress-f921d.firebaseapp.com",
        projectId: "sabziexpress-f921d",
        storageBucket: "sabziexpress-f921d.appspot.com",
        messagingSenderId: "210863800176",
        appId: "1:210863800176:web:355f90b324465f30be19b5",
        measurementId: "G-6ZZHM665DL"
      };
      // Initialize Firebase
      firebase.initializeApp(firebaseConfig);
    //   firebase.analytics();
        
        <!--OTP Script-->
             window.onload = function () {
                render();
            };
    
            function render() {
                window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
            }
            function phoneAuth() {
                var num = $("#number").val();
                var a = '+';
                var number = a + num;
                // alert(number);
                firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                    window.confirmationResult = confirmationResult;
                    coderesult = confirmationResult;
                    //console.log(coderesult);
                    $("#successAuth").text("Message sent");
                    $("#successAuth").show();
                    //codeverify(confirmationResult);
                }).catch(function (error) {
                    $("#error").text(error.message);
                    $("#error").show();
                });
            }
            // };
            function codeverify() {
                var code = $("#verificationCode").val();
                 //alert(code);
                coderesult.confirm(code).then(function (result) {
                var user = result.user;
                console.log(result.user.phoneNumber);
                $("#successOtpAuth").text("Auth is successful");
                $("#successOtpAuth").show();
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
            }
        </script>
</body>

</html>
