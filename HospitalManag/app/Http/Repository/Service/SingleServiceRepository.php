<?php

namespace App\Http\Repository\Service;
use App\Http\Interfaces\Service\SingleServiceRepositoryInterface;
use App\Models\Admin\Service;

class SingleServiceRepository implements SingleServiceRepositoryInterface{
    public function index(){
        $services = Service::all();
        return view('dashboard.services.singleService.index',compact('services'));
    }
}