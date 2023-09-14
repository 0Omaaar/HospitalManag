@extends('dashboard.layouts.master2')
@section('css')
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
                                        <div class="main-signup-header">
                                            <h2 class="text-primary">Get Started</h2>
                                            <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.
                                            </h5>
                                            <form action="{{route('register')}}" method="POST" autocomplete="off">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Name</label> <input class="form-control" autofocus required
                                                        placeholder="Enter your name" name="name" type="text">
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label> <input class="form-control" required
                                                        placeholder="Enter your email" name="email" type="email">
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label> <input class="form-control" required
                                                        placeholder="Enter your password" name="password" type="password">
                                                <div class="row row-xs">
                                                    <div class="form-group">
                                                        <label>Password Confirmation</label> <input class="form-control" required
                                                            placeholder="Confirm your password" name="password_confirmation"
                                                            type="password">
                                                    </div><button class="btn btn-main-primary btn-block"
                                                        type="submit">Create Account</button>
                                            </form>
                                            <div class="main-signup-footer mt-5">
                                                <p>Already have an account? <a href="{{route('login')}}">Sign
                                                        In</a></p>
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
@endsection
