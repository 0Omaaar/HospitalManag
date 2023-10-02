<?php

namespace App\Http\Repository\Service;

use App\Http\Interfaces\Service\SingleServiceRepositoryInterface;
use App\Models\Admin\Service;

class SingleServiceRepository implements SingleServiceRepositoryInterface
{
    public function index()
    {
        $services = Service::all();
        return view('dashboard.services.singleService.index', compact('services'));
    }

    public function store($request)
    {
        try {
            $service = new Service();
            $service->name = $request->name;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->save();

            session()->flash('add');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update($request)
    {
        try {
            $service = Service::findorfail($request->id);
            $service->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'status' => $request->status
            ]);

            session()->flash('edit');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($request)
    {
        try {
            $service = Service::findorfail($request->id)->delete();

            session()->flash('delete');

            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}