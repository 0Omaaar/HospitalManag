@extends('dashboard.layouts.master2')
@section('css')
    <style>
        .panel {
            display: none;
        }
    </style>
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ URL::asset('backDashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}"
        rel="stylesheet">
@endsection
@section('content')
    <!-- Page -->
    <div class="page">
        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{ URL::asset('backDashboard/assets/img/media/login.png') }}"
                                class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex"> <a href="{{ url('/' . ($page = 'index')) }}"><img
                                                    src="{{ URL::asset('backDashboard/assets/img/brand/favicon.png') }}"
                                                    class="sign-favicon ht-40" alt="logo"></a>
                                            <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Va<span>le</span>x</h1>
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>Welcome back!</h2>
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <div class="form-group">
                                                    <label for="exampleFormControlSelect1">Choose Your Role</label>
                                                    <select class="form-control" id="sectionChooser" autofocus>
                                                        <option value="" selected disabled>
                                                            Choose Your Role...</option>
                                                        <option value="user">Patient
                                                        </option>
                                                        <option value="admin">Admin
                                                        </option>
                                                        <option value="doctor">Doctor</option>
                                                        <option value="ray_employee">Ray Employee</option>
                                                        <option value="laboratorie_employee">Laboratorie Employee</option>
                                                    </select>
                                                </div>


                                                {{-- patient form --}}
                                                <div class="panel" id="user">
                                                    <h5 class="font-weight-semibold mb-4">Please sign in to continue</h5>
                                                    <form action="{{ route('login.user') }}" method="POST"
                                                        autocomplete="off">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label>Email</label> <input name="email" class="form-control"
                                                                placeholder="Enter your email" type="email"
                                                                :value="old('email')" required autofocus>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Password</label> <input name="password"
                                                                class="form-control" placeholder="Enter your password"
                                                                type="password" :value="old('password')">
                                                        </div><button class="btn btn-main-primary btn-block"
                                                            type="submit">Sign In</button>
                                                        <div class="row row-xs">
                                                            <div class="col-sm-6">
                                                                <button class="btn btn-block"><i
                                                                        class="fab fa-facebook-f"></i> Signup with
                                                                    Facebook</button>
                                                            </div>
                                                            <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                                <button class="btn btn-info btn-block"><i
                                                                        class="fab fa-twitter"></i> Signup with
                                                                    Twitter</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="main-signin-footer mt-5">
                                                        <p><a href="">Forgot password?</a></p>
                                                        <p>Don't have an account? <a href="{{ route('register') }}">Create
                                                                an Account</a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection
@section('js')
    <script>
        $('#sectionChooser').change(function() {
            var myID = $(this).val();
            $('.panel').each(function() {
                myID === $(this).attr('id') ? $(this).show() : $(this).hide();
            });
        });
    </script>
@endsection
