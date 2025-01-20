<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        return view('projects.index', ['projects' => Project::all()->where('userid', auth()->id())]);
    }

    public function create()
    {
        return view('projects.form', ['type' => 'add', 'project' => new Project]);
    }

    public function store(Request $request)
    {
        try {
            $val = $request->validate([
                'name' => 'required|max:200',
                'description' => 'required',
                'image' => '',
                'link' => 'required',
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        // dd($val);
        $project = new Project;

        $project->name = $request->name;
        $project->description = $request->description;
        if($request->hasFile('image')) {
            $project->image = $request->image->store('projects', 'public');
        }
        $project->link = $request->link;
        $project->userid = auth()->id();

        $project->save();

        return redirect()->route('projects.index');
    }

    public function show(Project $project)
    {
        return view('projects.detail', ['project' => $project]);
    }

    public function edit(Project $project)
    {
        return view('projects.form', ['type' => 'edit', 'project' => $project]);
    }

    public function update(Request $request, Project $project)
    {
        try {
            $val = $request->validate([
                'name' => 'required|max:200',
                'description' => 'required',
                'image' => 'image',
                'link' => 'required',
            ]);
        } catch (\Exception $e) {
            dd($e);
        }

        $project->name = $request->name;
        $project->description = $request->description;
        if ($request->hasFile('image')) {
            $project->image = $request->image->store('projects', 'public');
        }
        $project->link = $request->link;

        $project->save();

        return redirect()->route('projects.index');
    }

    public function destroy(Project $project) {
        $project->delete();

        return redirect()->route('projects.index');
    }
}
