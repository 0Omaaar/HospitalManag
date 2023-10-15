@extends('Dashboard.layouts.master')
@section('title')
    Pay Receipt
@stop
@section('css')
<link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Finance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Pay
                    receipt</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('payment.create') }}" class="btn btn-primary" role="button"
                            aria-pressed="true">Add New Payment</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Patient</th>
                                    <th>Amount</th>
                                    <th>Notes</th>
                                    <th>Added At</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $payment->patients->name }}</td>
                                        <td>{{ number_format($payment->amount, 2) }}</td>
                                        <td>{{ \Str::limit($payment->description, 50) }}</td>
                                        <td>{{ $payment->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('payment.edit', $payment->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $payment->id }}"><i
                                                    class="las la-trash"></i></a>
                                            <a href="{{ route('payment.show', $payment->id) }}"
                                                class="btn btn-dark btn-sm" target="_blank" title="Print"><i
                                                    class="fas fa-print"></i></a>
                                        </td>
                                    </tr>
                                    @include('dashboard.payments.delete')
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
<script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
<script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>

@endsection
