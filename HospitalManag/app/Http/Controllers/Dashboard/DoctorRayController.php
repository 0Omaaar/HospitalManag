<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\doctor_dashboard\RayRepositoryInterface;
use Illuminate\Http\Request;

class DoctorRayController extends Controller
{

    private $ray;

    public function __construct(RayRepositoryInterface $ray)
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
