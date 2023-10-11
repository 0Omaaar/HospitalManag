@extends('Dashboard.layouts.master')
@section('css')

@endsection

@section('title')
    Edit Receipt
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Finance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Edit
                    Receipt</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    @include('Dashboard.messages_alert')
    <!-- row -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('receipt.update', 'test') }}" method="post" autocomplete="off">
                        {{ method_field('patch') }}
                        @csrf
                        <div class="pd-30 pd-sm-40 bg-gray-200">

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>Patient</label>
                                    <input class="form-control" value="{{ $receipt_accounts->id }}" name="id"
                                        type="hidden">

                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <select name="patient_id" class="form-control select2" required>
                                        @foreach ($Patients as $Patient)
                                            <option value="{{ $Patient->id }}"
                                                {{ $receipt_accounts->patient_id == $Patient->id ? 'selected' : '' }}>
                                                {{ $Patient->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>Amount</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <input class="form-control" value="{{ $receipt_accounts->amount }}" name="debit"
                                        type="number">
                                </div>
                            </div>

                            <div class="row row-xs align-items-center mg-b-20">
                                <div class="col-md-1">
                                    <label>Notes</label>
                                </div>
                                <div class="col-md-11 mg-t-5 mg-md-t-0">
                                    <textarea class="form-control" name="description" rows="3">{{ $receipt_accounts->description }}</textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-main-primary pd-x-30 mg-r-5 mg-t-5">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>

@endsection
@section('js')

@endsection
