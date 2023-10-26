<?php

namespace App\Http\Interfaces\doctor_dashboard;

interface DiagnosisRepositoryInterface
{
    public function store($request);

    public function show($id);
}
