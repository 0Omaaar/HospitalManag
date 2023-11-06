<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Diagnostic;
use App\Models\Ray;
use Illuminate\Http\Request;

class PatientDetailsController extends Controller
{

    public function index($id)
    {
        $patient_records = Diagnostic::where('patient_id', $id)->get();
        $patient_rays = Ray::where('patient_id', $id)->get();
        //to add labo

        return view('dashboard.doctor.invoices.patient_details', compact('patient_records', 'patient_rays'));
    }

}
