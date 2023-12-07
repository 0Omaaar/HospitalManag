<?php

namespace App\Http\Controllers\PatientDashboard;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Laboratorie;
use App\Models\Ray;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function invoices(){
        $invoices = Invoice::where('patient_id',auth()->user()->id)->get();
        return view('dashboard.patient.invoices',compact('invoices'));
//        return "ok";
    }

    public function laboratories(){
        $laboratories = Laboratorie::where('patient_id',auth()->user()->id)->get();
        return view('dashboard.patient.laboratories',compact('laboratories'));
    }

    public function rays(){
        $rays = Ray::where('patient_id',auth()->user()->id)->get();
        return view('dashboard.patient.rays',compact('rays'));
    }

    public function viewLaboratories($id){

        $laboratorie = Laboratorie::findorFail($id);
        if($laboratorie->patient_id !=auth()->user()->id){
             abort('404');
        }
        return view('dashboard.laboratorie_employee_dashboard.invoices.patient_details', compact('laboratorie'));
    }

    public function viewRays($id)
    {
        $rays = Ray::findorFail($id);
        if($rays->patient_id !=auth()->user()->id){
            abort(404);
        }
        return view('dashboard.ray_employee_dashboard.invoices.patient_details', compact('rays'));
    }
}
