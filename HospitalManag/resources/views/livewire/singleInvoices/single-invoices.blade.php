<div>

    @if ($catchError)
        <div class="alert alert-danger" id="success-danger">
            <button type="button" class="close" data-dismiss="alert">x</button>
            {{ $catchError }}
        </div>
    @endif

    @if ($InvoiceSaved)
        <div class="alert alert-info">Data Saved Successfully.</div>
    @endif

    @if ($InvoiceUpdated)
        <div class="alert alert-info">Data Updated Successfully.</div>
    @endif
    @if ($InvoiceDeleted)
        <div class="alert alert-danger">Data Deleted Successfully.</div>
    @endif
    @if ($show_table)
        @include('livewire.singleInvoices.table')
    @else
        <form wire:submit.prevent="store" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col">
                    <label>Patient</label>
                    <select wire:model="patient_id" class="form-control" required>
                        <option value="">-- Choose --</option>
                        @foreach ($Patients as $Patient)
                            <option value="{{ $Patient->id }}">{{ $Patient->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>Doctor</label>
                    <select wire:model="doctor_id" wire:change="get_section" class="form-control"
                        id="exampleFormControlSelect1" required>
                        <option value="">-- Choose --</option>
                        @foreach ($Doctors as $Doctor)
                            <option value="{{ $Doctor->id }}">{{ $Doctor->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col">
                    <label>Section</label>
                    <input wire:model="section_id" type="text" class="form-control" readonly>
                </div>

                <div class="col">
                    <label>Invoice Type</label>
                    <select wire:model="type" class="form-control" {{ $updateMode == true ? 'disabled' : '' }}>
                        <option value="">-- Choose --</option>
                        <option value="1">Cash</option>
                        <option value="2">Credit</option>
                    </select>
                </div>


            </div><br>

            <div class="row row-sm">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header pb-0">
                            <div class="d-flex justify-content-between">
                                <h4 class="card-title mg-b-0"></h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mg-b-0 text-md-nowrap" style="text-align: center">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Service</th>
                                            <th>Price</th>
                                            <th>Discount Value</th>
                                            <th>Tax Rate</th>
                                            <th>Tax value</th>
                                            <th>Total With Tax</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>
                                                <select wire:model="service_id" class="form-control"
                                                    wire:change="get_price" id="exampleFormControlSelect1">
                                                    <option value="">-- Choose --</option>
                                                    @foreach ($Services as $Service)
                                                        <option value="{{ $Service->id }}">{{ $Service->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input wire:model="price" type="text" class="form-control" readonly>
                                            </td>
                                            <td><input wire:model="discount_value" type="text" class="form-control">
                                            </td>
                                            <th><input wire:model="tax_rate" type="text" class="form-control"></th>
                                            <td><input type="text" class="form-control" value="{{ $tax_value }}"
                                                    readonly></td>
                                            <td><input type="text" class="form-control" readonly
                                                    value="{{ $subtotal + $tax_value }}"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- bd -->
                        </div><!-- bd -->
                    </div><!-- bd -->
                </div>
            </div>

            <input class="btn btn-outline-success" type="submit" value="Save">
        </form>

    @endif


</div>
