<?php
namespace App\Http\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Admin\Section;


class SectionRepository implements \App\Http\Interfaces\Sections\SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();
        return view('dashboard.Sections.index', compact('sections'));
        // return "ok";
    }

    public function store($request)
    {

    }

    // Update Sections
    public function update($request)
    {

    }

    // destroy Sections
    public function destroy($request)
    {

    }

    // destroy Sections
    public function show($id)
    {

    }
}