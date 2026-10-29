<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use App\Models\SkillGroup;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $groups = SkillGroup::with('skills')->orderBy('order', 'asc')->get();
        return view('admin.skills.index', compact('groups'));
    }

    public function create()
    {
        $groups = SkillGroup::all();
        return view('admin.skills.create', compact('groups'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'group_key' => 'required|string',
            'subgroup' => 'nullable|string',
            'name' => 'required|string',
            'percentage' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
        ]);

        Skill::create($data);

        return redirect()->route('admin.skill.index')->with('success', 'Skill berhasil ditambahkan!');
    }

    public function edit(Skill $skill)
    {
        $groups = SkillGroup::all();
        return view('admin.skills.edit', compact('skill', 'groups'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->validate([
            'group_key' => 'required|string',
            'subgroup' => 'nullable|string',
            'name' => 'required|string',
            'percentage' => 'required|integer|min:0|max:100',
            'order' => 'nullable|integer',
        ]);

        $skill->update($data);

        return redirect()->route('admin.skill.index')->with('success', 'Skill berhasil diperbarui!');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('admin.skill.index')->with('success', 'Skill berhasil dihapus!');
    }
}
