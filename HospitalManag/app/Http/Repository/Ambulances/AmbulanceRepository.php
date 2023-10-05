<?php

namespace App\Http\Repository\Ambulances;

use App\Http\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    public function index()
    {
        $ambulances = Ambulance::all();
        return view('dashboard.ambulances.index', compact('ambulances'));
    }

    public function create()
    {
        return view('dashboard.ambulances.create');
    }

    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);
        return view('dashboard.ambulances.edit',compact('ambulance'));
    }

    public function store($request)
    {
        try {

            $ambulance = new Ambulance();
            $ambulance->car_number = $request->car_number;
            $ambulance->car_model = $request->car_model;
            $ambulance->car_year_made = $request->car_year_made;
            $ambulance->driver_license_number = $request->driver_license_number;
            $ambulance->driver_phone = $request->driver_phone;
            $ambulance->is_available = 1;
            $ambulance->car_type = $request->car_type;
            $ambulance->driver_name = $request->driver_name;
            $ambulance->notes = $request->notes;
            $ambulance->save();

            session()->flash('add');

            return redirect()->route('ambulance.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        if (!$request->has('is_available'))
            $request->request->add(['is_available' => 2]);
        else
            $request->request->add(['is_available' => 1]);

        $ambulance = Ambulance::findOrFail($id);

        $ambulance->update($request->all());

        session()->flash('edit');

        return redirect()->route('ambulance.index');
    }

    public function destroy($id)
    {
        try {
            $ambulance = Ambulance::findorfail($id)->delete();

            session()->flash('delete');

            return redirect()->route('ambulance.index');
        } catch (\Exception $e) {
            return redirect()->route('ambulance.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}