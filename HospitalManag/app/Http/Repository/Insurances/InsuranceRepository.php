<?php

namespace App\Http\Repository\Insurances;

use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Models\Insurance;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    public function index()
    {
        $insurances = Insurance::all();

        return view('dashboard.insurance.index', compact('insurances'));
    }

    public function create()
    {
        return view('dashboard.insurance.create');
    }

    public function edit($id)
    {
        $insurance = Insurance::findorfail($id);

        return view('dashboard.insurance.edit', compact('insurance'));
    }

    public function store($request)
    {
        try {
            $insurance = Insurance::create([
                'name' => $request->name,
                'notes' => $request->notes,
                'insurance_code' => $request->insurance_code,
                'discount_percentage' => $request->discount_percentage,
                'company_rate' => $request->company_rate,
                'status' => 1
            ]);

            session()->flash('add');

            return redirect()->route('insurance.index');
        } catch (\Exception $e) {
            return redirect()->route('insurance.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request, $id)
    {
        try {
            $insurance = Insurance::findorfail($id);

            if($request->has('status')){
                $status = 1;
            }else{
                $status = 0;
            }

            $insurance->update([
                'name' => $request->name,
                'notes' => $request->notes,
                'insurance_code' => $request->insurance_code,
                'discount_percentage' => $request->discount_percentage,
                'company_rate' => $request->company_rate,
                'status' => $status
            ]);

            session()->flash('edit');

            return redirect()->route('insurance.index');
        } catch (\Exception $e) {
            return redirect()->route('insurance.index')->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id){
        try {
            $insurance = Insurance::findorfail($id)->delete();

            session()->flash('delete');

            return redirect()->route('insurance.index');
        } catch (\Exception $e) {
            return redirect()->route('insurance.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
}