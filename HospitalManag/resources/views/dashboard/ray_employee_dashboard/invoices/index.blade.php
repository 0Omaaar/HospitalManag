@extends('dashboard.layouts.master')
@section('title')
    X-Rays
@stop
@section('css')


    <link href="{{URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>

    @section('page-header')
        <!-- breadcrumb -->
        <div class="breadcrumb-header justify-content-between">
            <div class="my-auto">
                <div class="d-flex">
                    <h4 class="content-title mb-0 my-auto">X-Rays</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoices</span>
                </div>
            </div>
        </div>
        <!-- breadcrumb -->
    @endsection
    @section('content')
        @include('Dashboard.messages_alert')

        <div class="row row-sm">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table text-md-nowrap" id="example1">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Invoice Date</th>
                                    <th>Patient</th>
                                    <th>Doctor</th>
                                    <th>Description</th>
                                    <th>Invoice Status</th>
                                    <th>Processes</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $loop->iteration}}</td>
                                        <td>{{ $invoice->created_at }}</td>
                                        <td>{{ $invoice->Patient->name }}</td>
                                        <td>{{ $invoice->doctor->name }}</td>
                                        <td>{{ $invoice->description }}</td>
                                        <td>
                                            @if($invoice->case == 0)
                                                <span class="badge badge-danger">On Traitment</span>
                                            @else
                                                <span class="badge badge-success">Completed</span>
                                            @endif
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item" href="{{route('invoices.edit', $invoice->id)}}"><i class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;Add Diagnostic</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    @endsection
    @section('js')

        <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js')}}"></script>
        <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>

    @endsection
