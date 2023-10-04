<?php

namespace App\Http\Repository\Insurances;
use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;

class InsuranceRepository implements InsuranceRepositoryInterface{
    public function index(){
        return "index";
    }
}