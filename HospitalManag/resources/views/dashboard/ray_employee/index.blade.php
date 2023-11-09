@extends('dashboard.layouts.master')
@section('title')
    Employees List
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
                <h4 class="content-title mb-0 my-auto">Rays</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/Employees List</span>
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
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                           Add Employee
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table style="text-align: center" class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Added At</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ray_employees as $ray_employee)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$ray_employee->name}}</td>
                                    <td>{{ $ray_employee->email }}</td>
                                    <td>{{ $ray_employee->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$ray_employee->id}}"><i class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$ray_employee->id}}"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>

                                @include('dashboard.ray_employee.edit')
                                @include('dashboard.ray_employee.delete')

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('dashboard.ray_employee.add')
    </div>

@endsection
@section('js')

    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection