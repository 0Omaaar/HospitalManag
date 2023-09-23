<?php
namespace App\Http\Repository\Doctors;

use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Section;
use App\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{


    public function index()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create()
    {

    }


    public function store($request)
    {




    }

    public function update($request)
    {

    }

    public function destroy($request)
    {


    }


    public function edit($id)
    {

    }


}