<?php

namespace App\Http\Repository\doctor_dashboard;

use App\Models\Invoice;
use App\Models\LaboratorieEmployee;
use App\Models\RayEmployee;
use Illuminate\Support\Facades\Auth;

class DoctorInvoicesRepository implements \App\Http\Interfaces\doctor_dashboard\DoctorInvoicesRepositoryInterface
{
    public function index()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 1)->get();
        $ray_employees = RayEmployee::all();
        $laboratorie_employees = LaboratorieEmployee::all();
        return view('dashboard.doctor.invoices.index', compact('invoices', 'ray_employees', 'laboratorie_employees'));
    }

    public function completed_invoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 3)->get();
        return view('dashboard.doctor.invoices.completed_invoices', compact('invoices'));
    }

    public function review_invoices()
    {
        $invoices = Invoice::where('doctor_id', Auth::user()->id)->where('invoice_status', 2)->get();
        return view('dashboard.doctor.invoices.review_invoices', compact('invoices'));
    }
}
