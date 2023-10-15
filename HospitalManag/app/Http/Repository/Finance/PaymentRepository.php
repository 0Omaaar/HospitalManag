<?php
namespace App\Http\Repository\Finance;
use App\Http\Interfaces\Finance\PaymentRepositoryInterface;
use App\Models\Admin\Finance\PaymentAccount;
use App\Models\Admin\FundAccount\FundAccount;
use App\Models\Admin\PatientAccount\PatientAccount;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface
{
    // get All Payment
    public function index()
    {
        $payments = PaymentAccount::all();
        return view('dashboard.payments.index', compact('payments'));
    }

    // show form add   
    public function create()
    {
        $Patients = Patient::all();
        return view('Dashboard.payments.add',compact('Patients'));
    }

    // store Payment
    public function store($request)
    {
        DB::beginTransaction();

        try {
            // store payements
            $payment_accounts = new PaymentAccount();
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // store fund_accounts
            $fund_accounts = new FundAccount();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->debit = 0.00;
            $fund_accounts->save();

            // store patient_accounts
            $patient_accounts = new PatientAccount();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->payment_id = $payment_accounts->id;
            $patient_accounts->debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            session()->flash('add');
            return redirect()->route('payment.index');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // edit Payment
    public function edit($id)
    {
        $payment_accounts = PaymentAccount::findorfail($id);
        $Patients = Patient::all();

        return view('dashboard.payments.edit', compact('Patients', 'payment_accounts'));
    }

    // print Payment
    public function show($id)
    {
        $payment_account = PaymentAccount::findorfail($id);
        return view('dashboard.payments.print',compact('payment_account'));
    }

    // Update Payment
    public function update($request)
    {
        DB::beginTransaction();

        try {

            // update receipt_accounts
            $payment_accounts = PaymentAccount::findorfail($request->id);
            $payment_accounts->date =date('y-m-d');
            $payment_accounts->patient_id = $request->patient_id;
            $payment_accounts->amount = $request->credit;
            $payment_accounts->description = $request->description;
            $payment_accounts->save();

            // update fund_accounts
            $fund_accounts = FundAccount::where('payment_id',$payment_accounts->id)->first();
            $fund_accounts->date =date('y-m-d');
            $fund_accounts->payment_id = $payment_accounts->id;
            $fund_accounts->credit = $request->credit;
            $fund_accounts->debit = 0.00;
            $fund_accounts->save();

            // update patient_accounts
            $patient_accounts = PatientAccount::where('payment_id',$payment_accounts->id)->first();
            $patient_accounts->date =date('y-m-d');
            $patient_accounts->patient_id = $request->patient_id;
            $patient_accounts->payment_id = $payment_accounts->id;
            $patient_accounts->debit = $request->credit;
            $patient_accounts->credit = 0.00;
            $patient_accounts->save();

            DB::commit();
            session()->flash('edit');
            return redirect()->route('payment.index');

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // destroy Payment
    public function destroy($request)
    {
        try {
            PaymentAccount::destroy($request->id);
            session()->flash('delete');
            return redirect()->back();
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}