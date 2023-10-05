<?php

namespace App\Http\Controllers\Admin\Insurances;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;
use App\Http\Requests\InsuranceStoreRequest;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    protected $insurance;

    public function __construct(InsuranceRepositoryInterface $insurance)
    {
        $this->insurance = $insurance;
    }

    public function index()
    {
        return $this->insurance->index();
    }


    public function create()
    {
        return $this->insurance->create();
    }


    public function store(InsuranceStoreRequest $request)
    {
        return $this->insurance->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        return $this->insurance->edit($id);
    }


    public function update(InsuranceStoreRequest $request, string $id)
    {
        return $this->insurance->update($request, $id);
    }


    public function destroy(string $id)
    {
        return $this->insurance->destroy($id);
    }
}