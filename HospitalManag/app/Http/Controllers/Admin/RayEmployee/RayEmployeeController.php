<?php

namespace App\Http\Controllers\Admin\RayEmployee;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\RayEmployee\RayEmployeeRepositoryInterface;
use Illuminate\Http\Request;

class RayEmployeeController extends Controller
{
    private $ray;

    public function __construct(RayEmployeeRepositoryInterface $ray)
    {
        $this->ray = $ray;
    }

    public function index()
    {
        //
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
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
