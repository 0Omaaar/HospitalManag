<?php

namespace App\Http\Controllers\ray_employee_dashboard;

use App\Http\Controllers\Controller;
use App\Models\Ray;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = Ray::where('case',0)->get();
        return view('dashboard.ray_employee_dashboard.invoices.index',compact('invoices'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
