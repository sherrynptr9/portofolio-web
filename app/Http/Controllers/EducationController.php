<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index() {
        $educations = Education::all();
        return view('admin.education.index', compact('educations'));
    }

    public function create() {
        return view('admin.education.create');
    }

    public function store(Request $request) {
        Education::create($request->all());
        return redirect()->route('education.index');
    }

    public function edit(Education $education) {
        return view('admin.education.edit', compact('education'));
    }

    public function update(Request $request, Education $education) {
        $education->update($request->all());
        return redirect()->route('education.index');
    }

    public function destroy(Education $education) {
        $education->delete();
        return redirect()->route('education.index');
    }
}
