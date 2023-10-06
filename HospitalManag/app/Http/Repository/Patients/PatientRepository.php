<?php


namespace App\Http\Repository\Patients;

use App\Http\Interfaces\Patients\PatientRepositoryInterface;
use App\Models\Patient;
use Illuminate\Support\Facades\Hash;

class PatientRepository implements PatientRepositoryInterface
{
    // Get All Patients
    public function index()
    {
        $patients = Patient::all();
        return view('dashboard.patients.index', compact('patients'));
    }
    // Create New Patients
    public function create()
    {
        return view('dashboard.patients.create');
    }
    // Store new Patients
    public function store($request)
    {
        try {
            $patient = new Patient();
            $patient->email = $request->email;
            $patient->password = Hash::make($request->password);
            $patient->date_birth = $request->date_birth;
            $patient->phone = $request->phone;
            $patient->gender = $request->gender;
            $patient->blood_group = $request->blood_group;
            $patient->name = $request->name;
            $patient->address = $request->address;
            $patient->save();
            session()->flash('add');
            return redirect()->route('patient.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    // edit Patients
    public function edit($id)
    {
        $patient = Patient::findorfail($id);

        return view('dashboard.patients.edit', compact('patient'));
    }
    // show Patients
    public function show($id)
    {
        $Patient = patient::findorfail($id);
        // $invoices = Invoice::where('patient_id', $id)->get();
        // $receipt_accounts = ReceiptAccount::where('patient_id', $id)->get();
        // $Patient_accounts = PatientAccount::where('patient_id', $id)->get();

        return view('dashboard.patients.show', compact('Patient'));
    }
    // update Patients
    public function update($request, $id)
    {
        try {
            $patient = Patient::findOrFail($id);
            $patient->email = $request->email;
            $patient->date_birth = $request->date_birth;
            $patient->phone = $request->phone;
            $patient->gender = $request->gender;
            $patient->blood_group = $request->blood_group;
            $patient->name = $request->name;
            $patient->address = $request->address;
            $patient->save();
            session()->flash('edit');
            return redirect()->route('patient.index');
        } catch (\Exception $e) {
            return redirect()->route('patient.index')->withErrors(['error' => $e->getMessage()]);
        }
    }
    // Deleted Patients
    public function destroy($request)
    {
        $patient = Patient::findorfail($request->id)->delete();
        session()->flash('delete');
        return redirect()->back();
    }
}