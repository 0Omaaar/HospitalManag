@extends('Dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patients</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Patients
                    List</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('patient.create') }}" class="btn btn-primary">Add New Patient</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient Name</th>
                                    <th>Email</th>
                                    <th>Date Of Birth</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Blood Type</th>
                                    <th>Adress</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $patient)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('patient.show', $patient->id) }}">{{ $patient->name }}</a>
                                        </td>
                                        <td>{{ $patient->email }}</td>
                                        <td>{{ $patient->date_birth }}</td>
                                        <td>{{ $patient->phone }}</td>
                                        <td>{{ $patient->gender == 1 ? 'Male' : 'Female' }}</td>
                                        <td>{{ $patient->blood_group }}</td>
                                        <td>{{ $patient->address }}</td>
                                        <td>
                                            <a href="{{ route('patient.edit', $patient->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Deleted{{ $patient->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                            <a href="{{ route('patient.show', $patient->id) }}"
                                                class="btn btn-primary btn-sm"><i class="fas fa-eye"></i></a>

                                        </td>
                                    </tr>
                                    @include('dashboard.patients.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
