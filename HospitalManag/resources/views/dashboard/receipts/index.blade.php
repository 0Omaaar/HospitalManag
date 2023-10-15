@extends('Dashboard.layouts.master')
@section('title')
    Receipt
@stop
@section('css')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Finance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Receipt</span>
            </div>
        </div>
    </div>

@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('receipt.create') }}" class="btn btn-primary" role="button"
                            aria-pressed="true">Add Receipt</a>
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
                                    <th>Description</th>
                                    <th>Date</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($receipts as $receipt)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $receipt->patients->name }}</td>
                                        <td>{{ number_format($receipt->amount, 2) }}</td>
                                        <td>{{ \Str::limit($receipt->description, 50) }}</td>
                                        <td>{{ $receipt->created_at->diffForHumans() }}</td>
                                        <td>
                                            <a href="{{ route('receipt.edit', $receipt->id) }}"
                                                class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale"
                                                data-toggle="modal" href="#delete{{ $receipt->id }}"><i
                                                    class="las la-trash"></i></a>
                                            <a href="{{ route('receipt.show', $receipt->id) }}"
                                                class="btn btn-dark btn-sm" target="_blank" title="Print"><i
                                                    class="fas fa-print"></i></a>
                                        </td>
                                    </tr>
                                    @include('Dashboard.receipts.delete')
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

@endsection
