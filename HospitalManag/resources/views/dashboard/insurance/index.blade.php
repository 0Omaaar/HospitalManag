@extends('dashboard.layouts.master')
@section('css')
    
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('title')
    Insurance
@endsection
@section('page-header')
    
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Services</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ Insurance</span>
            </div>
        </div>
    </div>
    
@endsection
@section('content')
    @include('dashboard.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('insurance.create') }}"
                        class="btn btn-primary">Add Insurance</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                                <tr class="">
                                    <th>#</th>
                                    <th>Company Code</th>
                                    <th>Company Name</th>
                                    <th>Discount Percentage</th>
                                    <th>Insurance Bearing Percentage</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($insurances as $insurance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $insurance->insurance_code }}</td>
                                        <td>{{ $insurance->name }}</td>
                                        <td>{{ $insurance->discount_percentage }}</td>
                                        <td>{{ $insurance->company_rate }}</td>
                                        <td  style="border-radius: 20px;" class=" {{ $insurance->status == 1 ? 'bg-success' : 'bg-danger' }}">
                                            {{ $insurance->status == 1 ? 'Active' : 'Desactive' }}</td>
                                        <td>{{ $insurance->notes }}</td>
                                        <td>
                                            <a href="{{ route('insurance.edit', $insurance->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Deleted{{ $insurance->id }}"><i class="fas fa-trash"></i>
                                            </button>

                                        </td>
                                        @include('Dashboard.insurance.delete')
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
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>
@endsection
