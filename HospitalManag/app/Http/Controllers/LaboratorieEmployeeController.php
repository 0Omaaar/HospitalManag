<?php

namespace App\Http\Controllers;

use App\Models\LaboratorieEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;

class LaboratorieEmployeeController extends Controller
{

    public function index()
    {
        $laboratorie_employees = LaboratorieEmployee::all();
        return view('dashboard.laboratorie_employee.index',compact('laboratorie_employees'));
    }


    public function store(Request $request)
    {
        try {
            $laboratorie_employee = new LaboratorieEmployee();
            $laboratorie_employee->name = $request->name;
            $laboratorie_employee->email = $request->email;
            $laboratorie_employee->password = Hash::make($request->password);
            $laboratorie_employee->save();
            session()->flash('add');
            return back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request, string $id)
    {
        $input = $request->all();

        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }
        else{
            $input = Arr::except($input, ['password']);
        }

        $ray_employee = LaboratorieEmployee::find($id);
        $ray_employee->update($input);

        session()->flash('edit');
        return redirect()->back();
    }

    public function destroy(string $id)
    {
        try {
            LaboratorieEmployee::destroy($id);
            session()->flash('delete');
            return redirect()->back();
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
