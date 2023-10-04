@extends('dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Add Insurance
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">All Services</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Insurance</span>
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
                    <form action="{{ route('insurance.store') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>Company Code</label>
                                <input type="text" name="insurance_code" value="{{ old('insurance_code') }}"
                                    class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>Company Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Discount Percentage %</label>
                                <input type="number" name="discount_percentage"
                                    class="form-control @error('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>Insurance Bearing Percentage %</label>
                                <input type="number" name="company_rate"
                                    class="form-control @error('company_rate') is-invalid @enderror">
                                @error('company_rate')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Notes</label>
                                <textarea rows="5" cols="10" class="form-control" name="notes"></textarea>
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
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
