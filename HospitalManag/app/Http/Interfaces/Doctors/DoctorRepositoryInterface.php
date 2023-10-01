<?php

namespace App\Http\Interfaces\Doctors;

interface DoctorRepositoryInterface
{
    // get Doctor
    public function index();

    // create Doctor
    public function create();

    // store Doctor
    public function store($request);

    // update Doctor
    public function update($request);

    // destroy Doctor
    public function destroy($request);

    // Edit Doctor
    public function edit($id);

    // Update doctor's Password
    public function update_password($request);

}