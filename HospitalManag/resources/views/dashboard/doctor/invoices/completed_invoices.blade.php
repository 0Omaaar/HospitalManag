@extends('dashboard.layouts.master-doctor')
@section('title')
    Completed Invoices
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
                <h4 class="content-title mb-0 my-auto">Completed Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoices</span>
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
                                <th>Service</th>
                                <th>Patient</th>
                                <th>Price</th>
                                <th>Discount</th>
                                <th>Tax Rate</th>
                                <th>Tax Value</th>
                                <th>Total With Tax</th>
                                <th>Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $invoice->invoice_date }}</td>
                                    <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                    <td><a href="">{{ $invoice->Patient->name }}</a></td>
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
                                            <span class="badge badge-success">Completed</span>
                                        @endif
                                    </td>
                                </tr>
                                @include('dashboard.doctor.invoices.add_diagnosis')
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


    <!--Internal  Notify js -->
    <script src="{{URL::asset('backDashboard/assets//plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js')}}"></script>


    <!--Internal  Datepicker js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <!-- Internal Select2.min js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <!--Internal Ion.rangeSlider.min js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <!--Internal  jquery-simple-datetimepicker js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <!-- Ionicons js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <!--Internal  pickerjs js -->
    <script src="{{URL::asset('backDashboard/assets/plugins/pickerjs/picker.min.js')}}"></script>
    <!-- Internal form-elements js -->
    <script src="{{URL::asset('backDashboard/assets/js/form-elements.js')}}"></script>

@endsection
