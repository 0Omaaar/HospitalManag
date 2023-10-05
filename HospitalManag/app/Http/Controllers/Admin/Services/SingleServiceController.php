<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Service\SingleServiceRepositoryInterface;
use App\Http\Requests\SingleServiceStoreRequest;
use Illuminate\Http\Request;

class SingleServiceController extends Controller
{
    protected $service;

    public function __construct(SingleServiceRepositoryInterface $service){
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }


    public function create()
    {
        //
    }


    public function store(SingleServiceStoreRequest $request)
    {
        return $this->service->store($request);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(SingleServiceStoreRequest $request)
    {
        return $this->service->update($request);
    }


    public function destroy(Request $request)
    {
        return $this->service->destroy($request);
    }
}