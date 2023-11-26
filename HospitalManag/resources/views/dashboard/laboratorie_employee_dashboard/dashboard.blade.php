@extends('dashboard.layouts.master')
@section('css')
    <link href="{{URL::asset('backDashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('backDashboard/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <div>
                <h2 class="main-content-title tx-24 mg-b-1 mg-b-lg-1">Laboratorie Employee Dashboard</h2><br>
                <p class="mg-b-0">Welcome Back {{auth()->user()->name}}</p>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">Total Invoices</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Ray::count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">Total Invoices On Traitment</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Ray::where('case',0)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">Total Completed Invoices</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{App\Models\Ray::where('case',1)->count()}}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>

    </div>
    <!-- row closed -->

    <div class="row row-sm row-deck">
        <div class="col-md-12 col-lg-12 col-xl-12">
            <div class="card card-table-two">
                <div class="d-flex justify-content-between">
                    <h2 class="card-title mb-1">Last 5 Invoices On System</h2>
                </div><br>
                <div class="table-responsive country-table">
                    <table class="table table-striped table-bordered mb-0 text-sm-nowrap text-lg-nowrap text-xl-nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Invoice Date</th>
                            <th>Patient</th>
                            <th>Doctor</th>
                            <th>Description</th>
                            <th>Invoice Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse(\App\Models\Ray::latest()->take(5)->get() as $invoice )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="tx-right tx-medium tx-inverse">{{$invoice->created_at}}</td>
                                <td class="tx-right tx-medium tx-danger">{{$invoice->patient->name}}</td>
                                <td class="tx-right tx-medium tx-inverse">{{$invoice->doctor->name}}</td>
                                <td class="tx-right tx-medium tx-danger">{{$invoice->description}}</td>
                                <td class="tx-right tx-medium tx-inverse">
                                    @if($invoice->case == 0)
                                        <span class="badge badge-danger">On Traitment</span>
                                    @else
                                        <span class="badge badge-success">Completed</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            No Data !
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('js')

    <script src="{{URL::asset('backDashboard/assets/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.flot/jquery.flot.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.flot/jquery.flot.pie.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.flot/jquery.flot.resize.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jquery.flot/jquery.flot.categories.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/dashboard.sampledata.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/chart.flot.sampledata.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/apexcharts.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/modal-popup.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/index.js')}}"></script>
    <script src="{{URL::asset('backDashboard/assets/js/jquery.vmap.sampledata.js')}}"></script>
@endsection
