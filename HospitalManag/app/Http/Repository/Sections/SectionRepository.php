<?php
namespace App\Http\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Admin\Section;


class SectionRepository implements \App\Http\Interfaces\Sections\SectionRepositoryInterface
{
    public function index()
    {
        $sections = Section::all();
        return view('dashboard.sections.index', compact('sections'));
        // return "ok";
    }

    public function store($request)
    {
        Section::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('add');
        return redirect()->route('sections.index');
    }

    // Update Sections
    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
        ]);
        session()->flash('edit');
        return redirect()->route('sections.index');
    }

    // destroy Sections
    public function destroy($request)
    {
        $section = Section::findOrFail($request->id)->delete();
        session()->flash('delete');
        return redirect()->route('sections.index');
    }

    // destroy Sections
    public function show($id)
    {

    }
}