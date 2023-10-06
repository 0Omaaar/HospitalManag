@extends('dashboard.layouts.master')
@section('css')
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Ambulance</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Ambulance
                    Cars</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('dashboard.messages_alert')
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('ambulance.create') }}" class="btn btn-primary">Add New Ambulance Car</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Car Number</th>
                                    <th>Car Model</th>
                                    <th>Year_Car_Made</th>
                                    <th>Car Type</th>
                                    <th>Driver's Name</th>
                                    <th>Driver License's Number</th>
                                    <th>Driver Phone</th>
                                    <th>Status</th>
                                    <th>Notes</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ambulances as $ambulance)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $ambulance->car_number }}</td>
                                        <td>{{ $ambulance->car_model }}</td>
                                        <td>{{ $ambulance->car_year_made }}</td>
                                        <td>{{ $ambulance->car_type == 1 ? 'Owned' : 'Rented' }}</td>
                                        <td>{{ $ambulance->driver_name }}</td>
                                        <td>{{ $ambulance->driver_license_number }}</td>
                                        <td>{{ $ambulance->driver_phone }}</td>
                                        @if ($ambulance->is_available == 1)
                                            <td class="bg-success" style="border-radius: 10px;">Active</td>
                                        @else
                                            <td class="bg-danger" style="border-radius: 10px;">Desactive</td>
                                        @endif
                                        <td>{{ $ambulance->notes }}</td>
                                        <td>
                                            <a href="{{ route('ambulance.edit', $ambulance->id) }}"
                                                class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#Deleted{{ $ambulance->id }}"><i
                                                    class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                    @include('dashboard.ambulances.delete')
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
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
