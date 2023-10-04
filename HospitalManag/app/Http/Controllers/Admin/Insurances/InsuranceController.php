<?php

namespace App\Http\Controllers\Admin\Insurances;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Insurances\InsuranceRepositoryInterface;
use Illuminate\Http\Request;

class InsuranceController extends Controller
{
    protected $insurance;

    public function __construct(InsuranceRepositoryInterface $insurance){
        $this->insurance = $insurance;
    }
    
    public function index()
    {
        return $this->insurance->index();
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
