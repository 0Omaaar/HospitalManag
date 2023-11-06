<?php

namespace App\Http\Repository\doctor_dashboard;

use App\Http\Interfaces\doctor_dashboard\RayRepositoryInterface;
use App\Models\Ray;
use Illuminate\Support\Facades\DB;

class RayRepository implements RayRepositoryInterface
{
    public function store($request){
        try{
            $ray = Ray::create([
                'description' => $request->description,
                'invoice_id' => $request->invoice_id,
                'patient_id' => $request->patient_id,
                'doctor_id' => $request->doctor_id,
                'employee_id' => $request->ray_employee_id,
                'description_employee' => $request->description_employee
            ]);
            session()->flash('add');
            return redirect()->back();
        }catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function update($request, $id){
        try{
            $ray = Ray::findorfail($id);
            $ray->update([
                'description' => $request->description,
                'description_employee' => $request->description_employee
            ]);
            session()->flash('edit');
            return redirect()->back();
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function destroy($id){
        try{
            $ray = Ray::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
