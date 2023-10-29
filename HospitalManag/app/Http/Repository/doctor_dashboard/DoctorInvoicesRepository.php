<?php

namespace App\Http\Repository\doctor_dashboard;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class DoctorInvoicesRepository implements \App\Http\Interfaces\doctor_dashboard\DoctorInvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 1)->get();
        return view('dashboard.doctor.invoices.index', compact('invoices'));
    }

    public function completed_invoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();
        return view('dashboard.doctor.invoices.completed_invoices', compact('invoices'));
    }
}
