<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('order', 'asc')->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'badge' => 'required|string',
            'category_filter' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ], [
            'category_filter.required' => 'Pilih minimal satu kategori filter.',
        ]);

        if (is_array($request->category_filter)) {
            $data['category_filter'] = implode(', ', $request->category_filter);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = 'storage/' . $path;
        } else {
            $data['image'] = 'images/project_alcen.png';
        }

        Project::create($data);

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil ditambahkan!');
    }

    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'badge' => 'required|string',
            'category_filter' => 'required',
            'title' => 'required|string',
            'description' => 'required|string',
            'tags' => 'nullable|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ], [
            'category_filter.required' => 'Pilih minimal satu kategori filter.',
        ]);

        if (is_array($request->category_filter)) {
            $data['category_filter'] = implode(', ', $request->category_filter);
        }

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('projects', 'public');
            $data['image'] = 'storage/' . $path;
        }

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Project berhasil diperbarui!');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.project.index')->with('success', 'Project berhasil dihapus!');
    }
}
