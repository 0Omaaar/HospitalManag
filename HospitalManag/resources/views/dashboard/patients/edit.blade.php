@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Edit Patient
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patients</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
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
                    <form action="{{ route('patient.update', $patient->id) }}" method="post">
                        {{ method_field('patch') }}
                        {{ csrf_field() }}
                        @csrf
                        <div class="row">
                            <div class="col-3">
                                <label>Patient Name</label>
                                <input type="text" name="name" value="{{ $patient->name }}"
                                    class="form-control @error('name') is-invalid @enderror " required>
                            </div>

                            <div class="col">
                                <label>Email</label>
                                <input type="email" name="email" value="{{ $patient->email }}"
                                    class="form-control @error('email') is-invalid @enderror" required>
                            </div>

                            {{-- <div class="col">
                                <label>Password</label>
                                <input type="password" name="password" value="{{ $patient->password }}"
                                    class="form-control @error('password') is-invalid @enderror" required>
                            </div> --}}


                            <div class="col">
                                <label>Date Of Birth</label>
                                <input class="form-control fc-datepicker" name="date_birth" placeholder="YYYY-MM-DD"
                                    type="text" required value="{{ $patient->date_birth }}">
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col-3">
                                <label>Phone</label>
                                <input type="number" name="phone" value="{{ $patient->phone }}"
                                    class="form-control @error('phone') is-invalid @enderror" required>
                            </div>

                            <div class="col">
                                <label>Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option selected>{{ $patient->gender == 1 ? 'Male' : 'Female' }}</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                </select>
                            </div>

                            <div class="col">
                                <label>Blood Type</label>
                                <select class="form-control" name="blood_group" required>
                                    <option selected>{{ $patient->blood_group }}</option>
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
                                <textarea rows="5" cols="10" class="form-control" name="address">{{ $patient->address }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success" type="submit">Update</button>
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
