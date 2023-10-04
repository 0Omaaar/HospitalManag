<?php

namespace App\Http\Interfaces\Insurances;

interface InsuranceRepositoryInterface{
    public function index();

    public function create();

    public function edit($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}