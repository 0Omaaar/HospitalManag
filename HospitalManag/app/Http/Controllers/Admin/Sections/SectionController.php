<?php

namespace App\Http\Controllers\Admin\Sections;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\Sections\SectionRepositoryInterface;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    protected $section;

    public function __construct(SectionRepositoryInterface $section){
        $this->section = $section;
    }
    public function index()
    {
        return $this->section->index();
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        return $this->section->store($request);
    }

    
    public function show(string $id)
    {
        return $this->section->show($id);
    }

    
    public function edit(string $id)
    {
        //
    }

    
    public function update(Request $request)
    {
        return $this->section->update($request);
    }

    
    public function destroy(Request $request)
    {
        return $this->section->destroy($request);
    }
}
