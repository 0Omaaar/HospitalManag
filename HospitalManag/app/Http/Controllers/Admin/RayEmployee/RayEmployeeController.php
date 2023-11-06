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
        return $this->ray->index();
    }

    public function store(Request $request)
    {
        return $this->ray->store($request);
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
