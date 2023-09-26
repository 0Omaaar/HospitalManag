@extends('dashboard.layouts.master')
@section('title')
    Doctors
@stop
@section('css')
    <link href="{{ URL::asset('backDashboard/assets/plugins/notify/css/notifIt.css') }}" rel="stylesheet" />
@endsection


@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Doctors</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    View All</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('dashboard.messages_alert')
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">

                    <a href="{{ route('doctors.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Add
                        Doctor</a>
                    <button type="button" class="btn btn-danger" id="btn_delete_all">Delete</button>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><input name="select_all" id="example-select-all" type="checkbox" /></th>
                                    <th>Name</th>
                                    <th>img</th>
                                    <th>email</th>
                                    <th>section</th>
                                    <th>phone</th>
                                    {{-- <th>appointments</th> --}}
                                    <th>Status</th>
                                    <th>created_at</th>
                                    <th>Processes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($doctors as $doctor)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <input type="checkbox" name="delete_select" value="{{ $doctor->id }}"
                                                class="delete_select">
                                        </td>
                                        <td>{{ $doctor->name }}</td>
                                        <td>
                                            @if ($doctor->image)
                                                <img src="{{ Url::asset('backDashboard/assets/img/doctors/' . $doctor->image->filename) }}"
                                                    style="border-radius: 10px;" height="40px" width="50px"
                                                    alt="">
                                            @else
                                                <img src="{{ Url::asset('backDashboard/assets/img/doctor.png') }}"
                                                    height="40px" width="50px" alt=""
                                                    style="border-radius: 10px;">
                                            @endif
                                        </td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->section->name }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        {{-- <td>
                                            @foreach ($doctor->doctorappointments as $appointment)
                                                {{ $appointment->name }}
                                            @endforeach
                                        </td> --}}
                                        <td>
                                            <div
                                                class="dot-label bg-{{ $doctor->status == 1 ? 'success' : 'danger' }} ml-1">
                                            </div>
                                            {{-- {{ $doctor->status == 1 ? 'Enabled' : 'Not Enabled' }} --}}
                                        </td>

                                        <td>{{ $doctor->created_at->diffForHumans() }}</td>
                                        <td>

                                            <div class="dropdown">
                                                <button aria-expanded="false" aria-haspopup="true"
                                                    class="btn ripple btn-outline-primary btn-sm" data-toggle="dropdown"
                                                    type="button">Processes<i class="fas fa-caret-down mr-1"></i></button>
                                                <div class="dropdown-menu tx-13">
                                                    <a class="dropdown-item"
                                                        href="{{ route('doctors.edit', $doctor->id) }}"><i
                                                            style="color: #0ba360"
                                                            class="text-success ti-user"></i>&nbsp;&nbsp;Edit Doctor</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_password{{ $doctor->id }}"><i
                                                            class="text-primary ti-key"></i>&nbsp;&nbsp;Edit Docotr's
                                                        Password</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#update_status{{ $doctor->id }}"><i
                                                            class="text-warning ti-back-right"></i>&nbsp;&nbsp;Update
                                                        Doctor's Status</a>
                                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                                        data-target="#delete{{ $doctor->id }}"><i
                                                            class="text-danger  ti-trash"></i>&nbsp;&nbsp;Delete Doctor</a>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                    @include('dashboard.doctors.delete')
                                    {{-- @include('Dashboard.Doctors.delete_select')
                                @include('Dashboard.Doctors.update_password')
                                @include('Dashboard.Doctors.update_status') --}}
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!--Internal  Notify js -->
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('backDashboard/assets/plugins/notify/js/notifit-custom.js') }}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for (var i in checkboxes) {
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function() {
            $("#btn_delete_all").click(function() {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function() {
                    selected.push(this.value);
                });

                if (selected.length > 0) {
                    $('#delete_select').modal('show')
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>



@endsection
