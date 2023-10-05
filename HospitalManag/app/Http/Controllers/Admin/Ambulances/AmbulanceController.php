<?php

namespace App\Http\Controllers\Admin\Ambulances;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Ambulances\AmbulanceRepositoryInterface;
use App\Http\Requests\AmbulanceStoreRequest;
use Illuminate\Http\Request;

class AmbulanceController extends Controller
{

    protected $ambulance;

    public function __construct(AmbulanceRepositoryInterface $ambulance)
    {
        $this->ambulance = $ambulance;
    }

    public function index()
    {
        return $this->ambulance->index();
    }


    public function create()
    {
        return $this->ambulance->create();
    }


    public function store(AmbulanceStoreRequest $request)
    {
        return $this->ambulance->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return $this->ambulance->edit($id);
    }


    public function update(AmbulanceStoreRequest $request, string $id)
    {
        return $this->ambulance->update($request, $id);
    }


    public function destroy(string $id)
    {
        return $this->ambulance->destroy($id);
    }
}