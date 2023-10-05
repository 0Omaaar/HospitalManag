<?php

namespace App\Http\Interfaces\Ambulances;

interface AmbulanceRepositoryInterface{
    public function index();

    public function create();

    public function edit($id);

    public function store($request);

    public function update($request, $id);

    public function destroy($id);
}