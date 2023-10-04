@extends('Dashboard.layouts.master')
@section('css')
    <!--Internal   Notify -->
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Insurance
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Insurance</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('insurance.update', $insurance->id) }}" method="post">
                        @method('PUT')
                        @csrf

                        <div class="row">

                            <div class="col">
                                <label>Company code</label>
                                <input type="text" name="insurance_code" value="{{ $insurance->insurance_code }}"
                                    class="form-control @error('insurance_code') is-invalid @enderror">
                                @error('insurance_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>Company Name</label>
                                <input type="text" name="name" value="{{ $insurance->name }}"
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
                                    value="{{ $insurance->discount_percentage }}"
                                    class="form-control @error('discount_percentage') is-invalid @enderror">
                                @error('discount_percentage')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>Insurance Bearing Percentage %</label>
                                <input type="number" name="company_rate" value="{{ $insurance->company_rate }}"
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
                                <textarea rows="5" cols="10" class="form-control" name="notes">{{ $insurance->notes }}</textarea>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <label>Status</label>
                                <input name="status" {{ $insurance->status == 1 ? 'checked' : '' }} value="1"
                                    type="checkbox" class="form-check-input" id="exampleCheck1" style="margin-left: 10px;">
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
