@extends('dashboard.layouts.master-doctor')
@section('title')
    Reviews
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
                <h4 class="content-title mb-0 my-auto">Reviews</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoices</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    @include('dashboard.messages_alert')
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
                                <th>Service Price</th>
                                <th>Discount Value</th>
                                <th>Tax Rate</th>
                                <th>Tax Value</th>
                                <th>Total With Tax</th>
                                <th>Status</th>
                                <th>Date Of Review</th>
                                <th>Processes</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{ $invoice->invoice_date }}</td>
                                    <td>{{ $invoice->Service->name ?? $invoice->Group->name }}</td>
                                    <td><a href="{{route('Diagnostics.show',$invoice->patient_id)}}">{{ $invoice->Patient->name }}</a></td>
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

                                    <td>{{\App\Models\Diagnostic::where(['invoice_id' => $invoice->id])->first()->review_date}}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown" type="button">{{trans('doctors.Processes')}}<i class="fas fa-caret-down mr-1"></i></button>
                                            <div class="dropdown-menu tx-13">
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#add_diagnosis{{$invoice->id}}"><i class="text-primary fa fa-stethoscope"></i>&nbsp;&nbsp;Add Diagnosis</a>
                                                <a class="dropdown-item" href="#"><i  class="text-warning far fa-file-alt"></i>&nbsp;&nbsp; Add Review </a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password"><i class="text-primary fas fa-x-ray"></i>&nbsp;&nbsp;Convert To Rays</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status"><i class="text-warning fas fa-syringe"></i>&nbsp;&nbsp;Convert To Labo</a>
                                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete"><i class="text-danger  ti-trash"></i>&nbsp;&nbsp;Delete Review</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @include('dashboard.doctor.invoices.add_diagnosis')
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
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.maskedinput/jquery.maskedinput.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/spectrum-colorpicker/spectrum.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/amazeui-datetimepicker/js/amazeui.datetimepicker.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery-simple-datetimepicker/jquery.simple-dtpicker.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/pickerjs/picker.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/form-elements.js')}}"></script>

@endsection
