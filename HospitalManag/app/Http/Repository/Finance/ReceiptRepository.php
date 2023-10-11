<?php

namespace App\Http\Repository\Finance;

use App\Http\Interfaces\Finance\ReceiptRepositoryInterface;
use App\Models\Admin\Finance\ReceiptAccount;
use App\Models\Admin\FundAccount\FundAccount;
use App\Models\Admin\PatientAccount\PatientAccount;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class ReceiptRepository implements ReceiptRepositoryInterface
{
    // get All Receipt
    public function index()
    {
        $receipts = ReceiptAccount::all();
        return view('dashboard.receipts.index', compact('receipts'));
    }

    // show form add
    public function create()
    {
        $Patients = Patient::all();
        return view('dashboard.receipts.add', compact('Patients'));
    }

    // store Receipt
    public function store($request)
    {
        DB::beginTransaction();

        try {
            // store receipt_accounts
            $receipt_accounts = new ReceiptAccount();
            $receipt_accounts->date = date('y-m-d');
            $receipt_accounts->patient_id = $request->patient_id;
            $receipt_accounts->amount = $request->debit;
            $receipt_accounts->description = $request->description;
            $receipt_accounts->save();
            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date = date('y-m-d');
            $fund_accounts->receipt_id = $receipt_accounts->id;
            $fund_accounts->debit = $request->debit;
            $fund_accounts->credit = 0.00;
            $fund_accounts->save();
            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date = date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->receipt_id = $receipt_accounts->id;
            $patient_accounts->debit = 0.00;
            $patient_accounts->credit = $request->debit;
            $patient_accounts->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('receipt.index');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    // edit Receipt
    public function edit($id)
    {

    }

    // show Receipt
    public function show($id)
    {

    }

    // Update Receipt
    public function update($request)
    {

    }

    // destroy Receipt
    public function destroy($request)
    {
        try {
            $receipt = ReceiptAccount::findorfail($request->id)->delete();

            session()->flash('delete');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage]);
        }
    }
}