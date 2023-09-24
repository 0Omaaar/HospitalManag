<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public $doctor;

    public function __construct(DoctorRepositoryInterface $doctor)
    {
        $this->doctor = $doctor;
    }
    public function index()
    {
        return $this->doctor->index();
    }


    public function create()
    {
        return $this->doctor->create();
    }

    
    public function store(Request $request)
    {
        return $this->doctor->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}