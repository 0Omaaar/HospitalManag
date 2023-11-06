@extends('Dashboard.layouts.master-doctor')
@section('title')
    Invoices
@stop
@section('css')
        <link href="{{URL::asset('backDashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
        <link href="{{URL::asset('backDashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('backDashboard/assets/plugins/amazeui-datetimepicker/css/amazeui.datetimepicker.css')}}" rel="stylesheet">
        <link href="{{URL::asset('backDashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.css')}}" rel="stylesheet">
        <link href="{{URL::asset('backDashboard/assets/plugins/pickerjs/picker.min.css')}}" rel="stylesheet">
        <link href="{{URL::asset('backDashboard/assets/plugins/spectrum-colorpicker/spectrum.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Doctor Invoices</span>
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
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Invoice Date</th>
                                <th>Service</th>
                                <th>Patient</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Tax Rate</th>
                                <th>Tax Value</th>
                                <th>Total with Tax</th>
                                <th>Invoice Status</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $invoice->invoice_date }}</td>
                                    <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                    <td><a href="{{route('patient_details', $invoice->Patient->id)}}">{{ $invoice->Patient->name }}</a></td>
                                    <td>{{ number_format($invoice->price, 2) }}</td>
                                    <td>{{ number_format($invoice->discount_value, 2) }}</td>
                                    <td>{{ $invoice->tax_rate }}%</td>
                                    <td>{{ number_format($invoice->tax_value, 2) }}</td>
                                    <td>{{ number_format($invoice->total_with_tax, 2) }}</td>
                                    <td>
                                        @if($invoice->invoice_status == 1)
                                            <span class="badge badge-danger">On Traitment</span>
                                        @elseif($invoice->invoice_status == 2)
                                            <span class="badge badge-warning">On Review</span>
                                        @else
                                            <span class="badge badge-success">Done</span>
                                        @endif
                                    </td>

                                    <td>

                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i
                                                    class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#add_diagnosis{{$invoice->id}}"><i
                                                        class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp; Add
                                                    Diagnostic </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#add_review{{$invoice->id}}"><i
                                                        class="text-warning far fa-file-alt"></i>&nbsp;&nbsp; Add Review</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#xray_conversion{{$invoice->id}}"><i
                                                        class="text-primary fas fa-x-ray"></i>&nbsp;&nbsp;Rays
                                                    Conversion </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#laboratorie_conversion{{$invoice->id}}"><i
                                                        class="text-warning fas fa-syringe"></i>&nbsp;&nbsp;Labo
                                                    Conversion</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal"
                                                   data-target="#delete"><i class="text-danger  ti-trash"></i>&nbsp;&nbsp;Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('dashboard.doctor.invoices.add_diagnosis')
                                @include('dashboard.doctor.invoices.add_review')
                                @include('dashboard.doctor.invoices.ray_conversion')
                                @include('dashboard.doctor.invoices.laboratorie_conversion')
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

    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js')}}"></script>

    <script>
        $('#review_date').datetimepicker({})
    </script>

@endsection
