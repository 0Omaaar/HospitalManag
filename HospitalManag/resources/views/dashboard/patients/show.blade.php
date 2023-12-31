@extends('Dashboard.layouts.master')
@section('css')
@endsection
@section('title')
    Patient Infos
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Patients</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Informations</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-lg-12 col-md-12">
            <div class="card" id="basic-alert">
                <div class="card-body">
                    <div class="text-wrap">
                        <div class="example">
                            <div class="panel panel-primary tabs-style-1">
                                <div class=" tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <!-- Tabs -->
                                        <ul class="nav panel-tabs main-nav-line">
                                            <li class="nav-item"><a href="#tab1" class="nav-link active"
                                                    data-toggle="tab">Patient Infos</a></li>
                                            <li class="nav-item"><a href="#tab2" class="nav-link"
                                                    data-toggle="tab">Invoices</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab3" class="nav-link"
                                                    data-toggle="tab">Receipts</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab4" class="nav-link"
                                                    data-toggle="tab">Account</a></li>
                                            <li class="nav-item"><a href="#tab5" class="nav-link"
                                                    data-toggle="tab">Test</a>
                                            </li>
                                            <li class="nav-item"><a href="#tab6" class="nav-link"
                                                    data-toggle="tab">Test</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-body tabs-menu-body main-content-body-right border-top-0 border">
                                    <div class="tab-content">


                                        {{-- Strat Show Information Patient --}}

                                        <div class="tab-pane active" id="tab1">
                                            <br>
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Patient</th>
                                                            <th>Phone</th>
                                                            <th>Email</th>
                                                            <th>Date Of Birth</th>
                                                            <th>Gender</th>
                                                            <th>Blood Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>{{ $Patient->name }}</td>
                                                            <td>{{ $Patient->phone }}</td>
                                                            <td>{{ $Patient->email }}</td>
                                                            <td>{{ $Patient->date_birth }}</td>
                                                            <td>{{ $Patient->gender == 1 ? 'Male' : 'Female' }}</td>
                                                            <td>{{ $Patient->blood_group }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Show Information Patient --}}



                                        {{-- Start Invoices Patient --}}

                                        <div class="tab-pane" id="tab2">

                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Service</th>
                                                            <th>Invoice Date</th>
                                                            <th>Total With Tax</th>
                                                            <th>Invoice Type</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($invoices as $invoice)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $invoice->Service->name ?? $invoice->Group->name}}
                                                                </td>
                                                                <td>{{ $invoice->invoice_date }}</td>
                                                                <td>{{ $invoice->total_with_tax }}</td>
                                                                <td>{{ $invoice->type == 1 ? 'Cash' : 'Credit' }}</td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="4" scope="row" class="alert alert-success">
                                                                Total
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($invoices->sum('total_with_tax'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Invices Patient --}}



                                        {{-- Start Receipt Patient  --}}

                                        <div class="tab-pane" id="tab3">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                            <th>Notes</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($receipt_accounts as $receipt_account)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $receipt_account->date }}</td>
                                                                <td>{{ $receipt_account->amount }}</td>
                                                                <td>{{ $receipt_account->description }}</td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th scope="row" colspan="3" class="alert alert-success">
                                                                Total
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($receipt_accounts->sum('amount'), 2) }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        {{-- End Receipt Patient  --}}


                                        {{-- Start payment accounts Patient --}}
                                        <div class="tab-pane" id="tab4">
                                            <div class="table-responsive">
                                                <table class="table table-hover text-md-nowrap text-center" id="example1">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Added At</th>
                                                            <th>Notes</th>
                                                            <th>Debit</th>
                                                            <th>Credit</th>
                                                            <th>Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($Patient_accounts as $Patient_account)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $Patient_account->date }}</td>
                                                                <td>
                                                                    @if ($Patient_account->invoice_id == true)
                                                                        {{ $Patient_account->invoice->service->name ?? $Patient_account->invoice->Group->name  }}
                                                                    @elseif($Patient_account->receipt_id == true)
                                                                        {{ $Patient_account->ReceiptAccount->description }}
                                                                    @elseif($Patient_account->payment_id == true)
                                                                        {{ $Patient_account->PaymentAccount->description }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $Patient_account->debit }}</td>
                                                                <td>{{ $Patient_account->credit }}</td>
                                                                <td></td>
                                                            </tr>
                                                            <br>
                                                        @endforeach
                                                        <tr>
                                                            <th colspan="3" scope="row" class="alert alert-success">
                                                                Total
                                                            </th>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($Debit = $Patient_accounts->sum('debit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-primary">
                                                                {{ number_format($credit = $Patient_accounts->sum('credit'), 2) }}
                                                            </td>
                                                            <td class="alert alert-danger">

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                            </div>

                                            <br>

                                        </div>

                                        {{-- End payment accounts Patient --}}


                                        <div class="tab-pane" id="tab5">
                                            <p>praesentium voluptatum deleniti atque corrquas molestias excepturi sint
                                                occaecati cupiditate non provident,</p>
                                            <p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi,
                                                id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                                expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi
                                                optio cumque nihil impedit quo minus id quod maxime placeat facere
                                                possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        </div>
                                        <div class="tab-pane" id="tab6">
                                            <p>praesentium et quas molestias excepturi sint occaecati cupiditate non
                                                provident,</p>
                                            <p class="mb-0">similique sunt in culpa qui officia deserunt mollitia animi,
                                                id est laborum et dolorum fuga. Et harum quidem rerum facilis est et
                                                expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi
                                                optio cumque nihil impedit quo minus id quod maxime placeat facere
                                                possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Prism Precode -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
@endsection
@section('js')
@endsection
