<?php

namespace App\Http\Controllers\ray_employee_dashboard;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Ray;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{

    public function index()
    {
        $invoices = Ray::where('case',0)->get();
        return view('dashboard.ray_employee_dashboard.invoices.index',compact('invoices'));
    }

    public function completed_invoices(){
        $invoices = Ray::where('case',1)->get();
        return view('dashboard.ray_employee_dashboard.invoices.completed_invoices',compact('invoices'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        $rays = Ray::findorfail($id);
        return view('dashboard.ray_employee_dashboard.invoices.patient_details', compact('rays'));
    }


    public function edit($id)
    {
        $invoice = Ray::findorFail($id);
        return view('dashboard.ray_employee_dashboard.invoices.add_diagnosis',compact('invoice'));
    }

    public function verifyAndStoreImageForeach($varforeach , $foldername , $disk, $imageable_id, $imageable_type) {
        $Image = new Image();
        $Image->filename = $varforeach->getClientOriginalName();
        $Image->imageable_id = $imageable_id;
        $Image->imageable_type = $imageable_type;
        $Image->save();
        return $varforeach->storeAs($foldername, $varforeach->getClientOriginalName(), $disk);
    }
    public function update(Request $request, string $id)
    {
        $invoice = Ray::findorFail($id);

        $invoice->update([
            'employee_id'=> auth()->user()->id,
            'description_employee'=> $request->description_employee,
            'case'=> 1,
        ]);

        if( $request->hasFile( 'photos' ) ) {

            foreach ($request->photos as $photo) {
                $this->verifyAndStoreImageForeach($photo,'Rays','upload_image',$invoice->id,'App\Models\Ray');
            }

        }
        session()->flash('edit');
        return redirect()->route('invoices.index');
    }


    public function destroy(string $id)
    {
        //
    }
}
