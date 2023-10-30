<?php

namespace App\Http\Repository\doctor_dashboard;
use App\Http\Interfaces\doctor_dashboard\DiagnosisRepositoryInterface;
use App\Models\Diagnostic;
use Illuminate\Support\Facades\DB;

class DiagnosisRepository implements DiagnosisRepositoryInterface
{
    public function store($request){
        DB::beginTransaction();

        try {

//            $this->invoice_status($request->invoice_id,3);
            $diagnosis = new Diagnostic();
            $diagnosis->date = date('Y-m-d');
            $diagnosis->diagnosis = $request->diagnosis;
            $diagnosis->medicine = $request->medicine;
            $diagnosis->invoice_id = $request->invoice_id;
            $diagnosis->patient_id = $request->patient_id;
            $diagnosis->doctor_id = $request->doctor_id;
            $diagnosis->save();

            DB::commit();
            session()->flash('add');

            return redirect()->back();
        }

        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function show($id){
        $patient_records = Diagnostic::where('patient_id',$id)->get();
        return view('dashboard.doctor.invoices.patient_record',compact('patient_records'));
    }
}