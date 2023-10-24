<?php

namespace App\Http\Repository\doctor_dashboard;

use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class DoctorInvoicesRepository implements \App\Http\Interfaces\doctor_dashboard\DoctorInvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->get();
        return view('dashboard.doctor.invoices.index', compact('invoices'));
    }
}
