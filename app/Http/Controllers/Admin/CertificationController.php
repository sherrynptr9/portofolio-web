<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;

class CertificationController extends Controller
{
    public function index()
    {
        $certifications = Certification::orderBy('order', 'asc')->get();
        return view('admin.certifications.index', compact('certifications'));
    }

    public function create()
    {
        return view('admin.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'issuer' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'issued_date' => 'required|string',
            'badge_text' => 'required|string',
            'badge_type' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('certifications', 'public');
            $data['logo'] = 'storage/' . $path;
        }

        Certification::create($data);

        return redirect()->route('admin.certification.index')->with('success', 'Certification berhasil ditambahkan!');
    }

    public function edit(Certification $certification)
    {
        return view('admin.certifications.edit', compact('certification'));
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'issuer' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'issued_date' => 'required|string',
            'badge_text' => 'required|string',
            'badge_type' => 'required|string',
            'link' => 'nullable|string',
            'order' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('certifications', 'public');
            $data['logo'] = 'storage/' . $path;
        }

        $certification->update($data);

        return redirect()->route('admin.certification.index')->with('success', 'Certification berhasil diperbarui!');
    }

    public function destroy(Certification $certification)
    {
        $certification->delete();
        return redirect()->route('admin.certification.index')->with('success', 'Certification berhasil dihapus!');
    }
}
