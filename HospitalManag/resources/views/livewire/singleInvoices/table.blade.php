<div>
    
</div>

<button class="btn btn-primary pull-right" wire:click="show_form_add" type="button">Add New Invoice </button><br><br>
<div class="table-responsive">
    <table class="table text-md-nowrap" id="example1" data-page-length="50"style="text-align: center">
        <thead>
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Patient</th>
                <th>Invoice Date</th>
                <th>Doctor</th>
                <th>Section</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Tax Rate</th>
                <th>Tax Value</th>
                <th>Total With Tax</th>
                <th>Invoice Type</th>
                <th>Processes</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($single_invoices as $single_invoice)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $single_invoice->service->name }}</td>
                    <td>{{ $single_invoice->patient->name }}</td>
                    <td>{{ $single_invoice->invoice_date }}</td>
                    <td>{{ $single_invoice->doctor->name }}</td>
                    <td>{{ $single_invoice->section->name }}</td>
                    <td>{{ number_format($single_invoice->price, 2) }}</td>
                    <td>{{ number_format($single_invoice->discount_value, 2) }}</td>
                    <td>{{ $single_invoice->tax_rate }}%</td>
                    <td>{{ number_format($single_invoice->tax_value, 2) }}</td>
                    <td>{{ number_format($single_invoice->total_with_tax, 2) }}</td>
                    <td>{{ $single_invoice->type == 1 ? 'Cash' : 'Credit' }}</td>
                    <td>
                        <button wire:click="edit({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i
                                class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#delete_invoice" wire:click="delete({{ $single_invoice->id }})"><i
                                class="fa fa-trash"></i></button>
                        {{--   <button wire:click="print({{ $single_invoice->id }})" class="btn btn-primary btn-sm"><i class="fas fa-print"></i></button> --}}
                    </td>
                </tr>
            @endforeach
    </table>

    @include('livewire.singleInvoices.delete')

</div>
