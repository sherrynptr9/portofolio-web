<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('order', 'asc')->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('admin.experiences.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'period' => 'required|string',
            'position' => 'required|string',
            'company' => 'required|string',
            'tags' => 'nullable|string',
            'summary' => 'nullable|string',
            'contributions_title' => 'nullable|string',
            'contributions' => 'nullable|string',
            'metric_1_val' => 'nullable|string',
            'metric_1_desc' => 'nullable|string',
            'metric_2_val' => 'nullable|string',
            'metric_2_desc' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        Experience::create($data);

        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil ditambahkan!');
    }

    public function edit(Experience $experience)
    {
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, Experience $experience)
    {
        $data = $request->validate([
            'period' => 'required|string',
            'position' => 'required|string',
            'company' => 'required|string',
            'tags' => 'nullable|string',
            'summary' => 'nullable|string',
            'contributions_title' => 'nullable|string',
            'contributions' => 'nullable|string',
            'metric_1_val' => 'nullable|string',
            'metric_1_desc' => 'nullable|string',
            'metric_2_val' => 'nullable|string',
            'metric_2_desc' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        $experience->update($data);

        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil diperbarui!');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('admin.experience.index')->with('success', 'Experience berhasil dihapus!');
    }
}
