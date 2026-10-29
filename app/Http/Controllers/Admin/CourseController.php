<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('order', 'asc')->get();
        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'provider' => 'required|string',
            'hours' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        Course::create($data);

        return redirect()->route('admin.course.index')->with('success', 'Course/Bootcamp berhasil ditambahkan!');
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $data = $request->validate([
            'provider' => 'required|string',
            'hours' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required|string',
            'order' => 'nullable|integer',
        ]);

        $course->update($data);

        return redirect()->route('admin.course.index')->with('success', 'Course/Bootcamp berhasil diperbarui!');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.course.index')->with('success', 'Course/Bootcamp berhasil dihapus!');
    }
}
