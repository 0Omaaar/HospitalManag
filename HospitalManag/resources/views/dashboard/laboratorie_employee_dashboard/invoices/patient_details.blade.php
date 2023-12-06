@extends('Dashboard.layouts.master')
@section('title')
    Invoices
@stop
@section('css')

@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Laboratorie Results</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{$laboratorie->patient->name}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Labo Employee Marks</label>
        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{$laboratorie->description_employee}}</textarea>
    </div>

    <!-- Gallery -->
    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">

            @foreach($laboratorie->images as $image)

                <li class="col-sm-6 col-lg-4" data-responsive="{{URL::asset('backDashboard/assets/img/laboratories/'.$image->filename)}}" data-src="{{URL::asset('backDashboard/assets/img/Rays/'.$image->filename)}}">
                    <a href="#">
                        <img width="50px" height="350px" class="img-responsive" src="{{URL::asset('backDashboard/assets/img/laboratories/'.$image->filename)}}" alt="NoImg">
                    </a>
                </li>
            @endforeach
        </ul>

    </div>
    </div>
    </div>


@endsection
@section('js')


@endsection
