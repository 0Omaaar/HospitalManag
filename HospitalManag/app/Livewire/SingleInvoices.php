<?php

namespace App\Livewire;

use App\Models\Admin\FundAccount\FundAccount;
use App\Models\Admin\PatientAccount\PatientAccount;
use App\Models\Admin\Section;
use App\Models\Admin\Service;
use App\Models\Admin\SingleInvoice\SingleInvoice;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class SingleInvoices extends Component
{
    public $InvoiceSaved, $InvoiceUpdated, $InvoiceDeleted = false;
    public $show_table = true;
    public $tax_rate = 17;
    public $updateMode = false;
    public $price, $discount_value = 0, $patient_id, $doctor_id, $section_id, $type, $service_id, $single_invoice_id, $catchError;

    public function render()
    {
        return view('livewire.singleInvoices.single-invoices', [
            'single_invoices' => SingleInvoice::where('type', 1)->get(),
            'Patients' => Patient::all(),
            'Doctors' => Doctor::all(),
            'Services' => Service::all(),
            'subtotal' => $Total_after_discount = ((is_numeric($this->price) ? $this->price : 0)) - ((is_numeric($this->discount_value) ? $this->discount_value : 0)),
            'tax_value' => $Total_after_discount * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100)
        ]);
    }

    public function show_form_add()
    {
        $this->show_table = false;
    }

    public function print($id)
    {
        $single_invoice = SingleInvoice::findorfail($id);
        return Redirect::route('print_single_invoices',[
            'invoice_date' => $single_invoice->invoice_date,
            'doctor_id' => $single_invoice->doctor->name,
            'section_id' => $single_invoice->section->name,
            'service_id' => $single_invoice->service->name,
            'type' => $single_invoice->type,
            'price' => $single_invoice->price,
            'discount_value' => $single_invoice->discount_value,
            'tax_rate' => $single_invoice->tax_rate,
            'total_with_tax' => $single_invoice->total_with_tax,
        ]);

    }

    public function get_section()
    {
        $doctor_id = Doctor::with('section')->where('id', $this->doctor_id)->first();
        $this->section_id = $doctor_id->section->name;
    }

    public function get_price()
    {
        $this->price = Service::where('id', $this->service_id)->first()->price;
    }


    public function edit($id)
    {

        $this->show_table = false;
        $this->updateMode = true;
        $single_invoice = SingleInvoice::findorfail($id);
        $this->single_invoice_id = $single_invoice->id;
        $this->patient_id = $single_invoice->patient_id;
        $this->doctor_id = $single_invoice->doctor_id;
        $this->section_id = Section::where('id', $single_invoice->section_id)->first()->name;

        $this->service_id = $single_invoice->service_id;
        $this->price = $single_invoice->price;
        $this->discount_value = $single_invoice->discount_value;
        $this->type = $single_invoice->type;


    }



    public function store()
    {

        if ($this->type == 1) {

            DB::beginTransaction();
            try {
                if ($this->updateMode) {

                    $single_invoices = SingleInvoice::findorfail($this->single_invoice_id);
                    $single_invoices->type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = Section::where('name', $this->section_id)->first()->id;
                    $single_invoices->service_id = $this->service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $single_invoices->total_with_tax = $single_invoices->price - $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();

                    $fund_accounts = FundAccount::where('invoice_id',$this->single_invoice_id)->first();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();

                    $this->InvoiceUpdated = true;
                    $this->show_table = true;


                } else {

                    $single_invoices = new SingleInvoice();
                    $single_invoices->type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = Section::where('name', $this->section_id)->first()->id;
                    $single_invoices->service_id = $this->service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $single_invoices->total_with_tax = $single_invoices->price - $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    // $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $fund_accounts = new FundAccount();
                    $fund_accounts->date = date('Y-m-d');
                    $fund_accounts->invoice_id = $single_invoices->id;
                    $fund_accounts->debit = $single_invoices->total_with_tax;
                    $fund_accounts->credit = 0.00;
                    $fund_accounts->save();

                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                $this->catchError = $e->getMessage();
            }

        } else {

            DB::beginTransaction();
            try {

                if ($this->updateMode) {

                    $single_invoices = SingleInvoice::findorfail($this->single_invoice_id);
                    $single_invoices->type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = Section::where('name', $this->section_id)->first()->id;
                    $single_invoices->service_id = $this->service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $single_invoices->total_with_tax = $single_invoices->price - $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    $single_invoices->save();


                    $patient_accounts = PatientAccount::where('invoice_id',$this->single_invoice_id)->first();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();

                    $this->InvoiceUpdated = true;
                    $this->show_table = true;

                } else {

                    $single_invoices = new SingleInvoice();
                    $single_invoices->type = 1;
                    $single_invoices->invoice_date = date('Y-m-d');
                    $single_invoices->patient_id = $this->patient_id;
                    $single_invoices->doctor_id = $this->doctor_id;
                    $single_invoices->section_id = Section::where('name', $this->section_id)->first()->id;
                    $single_invoices->service_id = $this->service_id;
                    $single_invoices->price = $this->price;
                    $single_invoices->discount_value = $this->discount_value;
                    $single_invoices->tax_rate = $this->tax_rate;
                    $single_invoices->tax_value = ($this->price - $this->discount_value) * ((is_numeric($this->tax_rate) ? $this->tax_rate : 0) / 100);
                    $single_invoices->total_with_tax = $single_invoices->price - $single_invoices->discount_value + $single_invoices->tax_value;
                    $single_invoices->type = $this->type;
                    // $single_invoices->invoice_status = 1;
                    $single_invoices->save();

                    $patient_accounts = new PatientAccount();
                    $patient_accounts->date = date('Y-m-d');
                    $patient_accounts->invoice_id = $single_invoices->id;
                    $patient_accounts->patient_id = $single_invoices->patient_id;
                    $patient_accounts->debit = $single_invoices->total_with_tax;
                    $patient_accounts->credit = 0.00;
                    $patient_accounts->save();
                    
                    $this->InvoiceSaved = true;
                    $this->show_table = true;
                }

                DB::commit();
            } catch (\Exception $e) {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }


        }

    }


    public function delete($id)
    {
        $this->single_invoice_id = $id;
    }

    public function destroy()
    {
        SingleInvoice::destroy($this->single_invoice_id);
        
        $this->show_table = true;
        $this->InvoiceDeleted = true;
        return redirect()->to('/single_invoices');
        
    }



}