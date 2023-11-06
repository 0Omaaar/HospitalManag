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

    public function store(Request $request)
    {
        return $this->ray->store($request);
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
        return $this->ray->update($request, $id);
    }
    public function destroy(string $id)
    {
        return $this->ray->destroy($id);
    }
}
