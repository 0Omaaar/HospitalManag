<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\doctor_dashboard\DoctorInvoicesRepositoryInterface;
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
}
