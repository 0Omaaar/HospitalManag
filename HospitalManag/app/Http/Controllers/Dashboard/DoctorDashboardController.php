<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\doctor_dashboard\DoctorInvoicesRepositoryInterface;
use App\Models\Laboratorie;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{
    protected $doctor;
    public function __construct(DoctorInvoicesRepositoryInterface $doctor){
        $this->doctor = $doctor;
    }
    public function index(){
        return $this->doctor->index();
    }
    public function completed_invoices(){
        return $this->doctor->completed_invoices();
    }
    public function review_invoices(){
        return $this->doctor->review_invoices();
    }

    public function showLaboratorie($id){
        $laboratories = Laboratorie::findorFail($id);
        if($laboratories->doctor_id !=auth()->user()->id){
            abort(404);
         }
        return view('dashboard.doctor.invoices.view_laboratories', compact('laboratories'));
    }
}
