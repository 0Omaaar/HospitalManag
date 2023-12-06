@extends('Dashboard.layouts.master')
@section('title')
    Patient Dashboard
@stop
@section('css')
    <link href="{{URL::asset('backDashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patient</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Laboratories</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')

    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th >Doctor</th>
                                <th>Labo Doctor</th>
                                <th>Description Of Labo Employee</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($laboratories as $laboratorie)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$laboratorie->description}}</td>
                                    <td>{{$laboratorie->doctor->name}}</td>
                                    <td>{{$laboratorie->employee->name}}</td>
                                    <td>{{$laboratorie->description}}</td>
                                    <td>
                                        @if($laboratorie->laboratorie_employee_id !== null)
                                            <a class="btn btn-primary btn-sm" href="{{route('laboratories.view', $laboratorie->id)}}" role="button">Show Labo Result</a>
                                        @endif                                                   </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>

    </div>

@endsection
@section('js')

    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
