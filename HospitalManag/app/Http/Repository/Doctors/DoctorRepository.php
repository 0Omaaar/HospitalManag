<?php
namespace App\Http\Repository\Doctors;

use App\Http\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Image;
use App\Models\Admin\Section;
use App\Http\Traits\UploadTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctorRepositoryInterface
{
    use UploadTrait;


    public function index()
    {
        $doctors = Doctor::all();
        return view('dashboard.doctors.index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        // $appointments = Appointment::all();
        return view('dashboard.doctors.add', compact('sections'));
    }


    public function store($request)
    {
        DB::beginTransaction();

        try {

            $doctors = new Doctor();
            $doctors->name = $request->name;
            $doctors->email = $request->email;
            $doctors->password = Hash::make($request->password);
            $doctors->section_id = $request->section_id;
            $doctors->phone = $request->phone;
            $doctors->status = 1;
            $doctors->number_of_statements = 0;
            $doctors->save();


            // insert pivot tABLE
            // $doctors->doctorappointments()->attach($request->appointments);


            //Upload img
            $this->verifyAndStoreImage($request, 'photo', 'doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors.index');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }



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