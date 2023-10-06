@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Add New Patient
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patients</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Add New
                    Patient</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('patient.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <label>Patient Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror " required>
                            </div>

                            <div class="col">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" required>
                            </div>

                            <div class="col">
                                <label>Password</label>
                                <input type="password" name="password" value="{{ old('password') }}"
                                    class="form-control @error('password') is-invalid @enderror" required>
                            </div>


                            <div class="col">
                                <label>Date Of Birth</label>
                                <input class="form-control fc-datepicker" name="date_birth" placeholder="YYYY-MM-DD"
                                    type="text" required>
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-3">
                                <label>Phone</label>
                                <input type="number" name="phone" value="{{ old('phone') }}"
                                    class="form-control @error('phone') is-invalid @enderror" required>
                            </div>

                            <div class="col">
                                <label>Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="" selected>-- Choose --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>

                            <div class="col">
                                <label>Blood Type</label>
                                <select class="form-control" name="blood_group" required>
                                    <option value="" selected>-- Choose --</option>
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Address</label>
                                <textarea rows="5" cols="10" class="form-control" name="address"></textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('backDashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script>
        var date = $('.fc-datepicker').datepicker({
            dateFormat: 'yy-mm-dd'
        }).val();
    </script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
