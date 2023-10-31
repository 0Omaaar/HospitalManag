<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    private $diagnosis;
    public function __construct(DiagnosisRepositoryInterface $diagnosis)
    {
        $this->diagnosis = $diagnosis;
    }

    public function store(Request $request)
    {
        return $this->diagnosis->store($request);
    }

    public function add_review(Request $request){
        return $this->diagnosis->add_review($request);
    }
    public function show(string $id)
    {
        return $this->diagnosis->show($id);
    }

}
