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


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return $this->doctor->edit($id);
    }


    public function update(Request $request)
    {
        return $this->doctor->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->doctor->destroy($request);
    }

    public function update_password(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ]);
        return $this->doctor->update_password($request);
    }

    public function update_status(Request $request){
        return $this->doctor->update_status($request);
    }
}