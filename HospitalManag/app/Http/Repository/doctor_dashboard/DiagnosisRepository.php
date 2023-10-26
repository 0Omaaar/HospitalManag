<?php

namespace App\Http\Repository\doctor_dashboard;
use App\Http\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request){
        return "store";
    }

    public function show($id){
        return "show";
    }
}
